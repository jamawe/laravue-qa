<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Question as QuestionResource;

class Answer extends JsonResource
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
                'type' => 'answers',
                'answer_id' => $this->id,
                'attributes' => [
                    'answered_by' => new UserResource($this->user),
                    'body' => $this->body,
                    'answered_at' => $this->created_at->diffForHumans(),
                    ]
                ],
                'links' => [
                    'self' => url('/questions/'.$this->question_id),
                ]
        ];
    }
}
