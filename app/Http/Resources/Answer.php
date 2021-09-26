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
            // 'data' => [
            //     'type' => 'answers',
            //     'answer_id' => $this->id,
            //     'attributes' => [
            //         'answered_question' => new QuestionResource($this->question),
            //         'answered_by' => new UserResource($this->user),
            //         'content' => $this->content,
            //     ]
            // ],
            // 'links' => [
            //     'self' => url('/answers/'.$this->id),
            // ]

            'data' => [
                'type' => 'answers',
                'answer_id' => $this->id,
                'attributes' => [
                    'answered_by' => new UserResource($this->user),
                // 'answered_question' => [
                //     'data' => [
                //         'attributes' => [
                //             'question_id' => $answer->question_id,
                //         ]
                //     ]
                // ],
                    'content' => $this->content,
                    'answered_at' => $this->created_at->diffForHumans(),
                    ]
                ],
                'links' => [
                    'self' => url('/questions/'.$this->question_id),
                ]
        ];
    }
}
