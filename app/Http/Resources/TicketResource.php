<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public static $wrap = 'ticket';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'  => $this->id,
            'attribute' => [
                'user_id' => $this->user_id,
                'title' => $this->title,
                'description' => $this->when(
                    $request->routeIs('tickets.show'),
                    $this->description
                ),
                'status' => $this->status,
            ],
            'relationship' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id'   => $this->user_id,
                    ],
                    'links' => [
                        'self' => route('user.show',['user' => $this->user_id]),
                    ],
                    'includes' => [
                        'user' => UserResource::make($this->whenLoaded('user')),
                    ]
                ],
            ],
            'links' => route('tickets.show',['ticket' => $this->id]),
        ];
    }
}
