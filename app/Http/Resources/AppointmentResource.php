<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Determine if the score can be shown based on the appointment status

        $can_see_score = ($this->status === 'completed' && $this->is_paid);

        return [
            'id'=> $this->id,
            'full_schedule' => \Carbon\Carbon::parse($this->schedule->date)->format('d M, Y') . ' | ' . $this->schedule->schedule,
            'status_label' => ucfirst($this->status),
            'is_completed' => $this->status === 'completed',
            'is_paid' => (bool) $this->is_paid,
            
            'score' => $can_see_score ? ($this->score ?? 'N/A' ) : 'Locked',

            'show_pay_button'=> !$this->is_paid,
        ];
    }
}
