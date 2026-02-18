<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ZoomService
{
    protected string $baseUrl = "https://api.zoom.us/v2";

    /**
     * Get a valid Access Token
     */

    private function getAccessToken()
    {
        return Cache::remember('zoom_access_token', 3500, function () {
            $response = Http::asForm()->withBasicAuth(
                env('ZOOM_CLIENT_ID'),
                env('ZOOM_CLIENT_SECRET')
            )->post("https://zoom.us/oauth/token", [
                'grant_type' => 'account_credentials',
                'account_id' => env('ZOOM_ACCOUNT_ID'),
            ]);

            return $response->json()['access_token'];
        });
    }

    /**
     * Create a Scheduled Meeting with Auto-Recording
     */
    
  public function createMeeting(array $data)
        {
            $token = $this->getAccessToken();

            $response = Http::withToken($token)
                ->post("{$this->baseUrl}/users/me/meetings", [
                    'topic'      => $data['topic'] ?? 'New Meeting',
                    'type'       => 2, 
                    'start_time' => $data['start_time']->format('Y-m-d\TH:i:s'), 
                    'duration'   => $data['duration'] ?? 40,
                    'settings'   => [
                        'host_video'        => true,
                        'participant_video' => true,
                        'join_before_host'  => false,
                        'mute_upon_entry'   => true,
                        'auto_recording'    => 'cloud', 
                    ],
                ]);

            return $response->json();
        }
}