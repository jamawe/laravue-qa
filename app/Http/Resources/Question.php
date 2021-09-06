<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'questions',
                'question_id' => $this->id,
                'attributes' => [
                    'asked_by' => new UserResource($this->user),
                    'title' => $this->title,
                ]
            ],
            'links' => [
                'self' => url('/questions/'.$this->id),
            ]
        ];
    }
}
