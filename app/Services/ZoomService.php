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

            $clientId = config('services.zoom.client_id');
            $clientSecret = config('services.zoom.client_secret');
            $accountId = config('services.zoom.account_id');

            if (!$clientId || !$clientSecret || !$accountId) {
                throw new \Exception("Zoom Credentials missing in config. Run php artisan config:clear.");
            }

            $response = Http::asForm()->withBasicAuth($clientId, $clientSecret)
                ->post("https://zoom.us/oauth/token", [
                    'grant_type' => 'account_credentials',
                    'account_id' => $accountId,
                ]);

            if ($response->failed()) {
                throw new \Exception("Zoom Token Error: " . $response->body());
            }

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