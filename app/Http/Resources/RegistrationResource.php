<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'center_name' => $this->center->center_name,
            'scheduled_date' => $this->scheduled_date,
            'registration_status' => $this->registration_status,
        ];
    }
}
