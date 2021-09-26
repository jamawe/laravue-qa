<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_answer()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create(), 'api');
        $question = Question::factory()->create(['id' => 123]);

        $response = $this->post('/api/questions/'.$question->id.'/answer', [
            // 'data' => [
            //     'type' => 'answers',
            //     'attributes' => [
                    'content' => 'Answer content',
            //     ]
            // ]
        ])
            ->assertStatus(200);

        $answer = Answer::first();

        $this->assertCount(1, Answer::all());

        // dd($answer);

        // $this->assertCount(1, Answer::all());
        
        $this->assertEquals($question->id, $answer->question_id);
        $this->assertEquals($user->id, $answer->user_id);
        $this->assertEquals('Answer content', $answer->content);

        $response
            ->assertJson([
               'data' => [
                    [
                        'data' => [
                        'type' => 'answers',
                        'answer_id' => $answer->id,
                        'attributes' => [
                            'answered_by' => [
                                'data' => [
                                    'user_id' => $user->id,
                                    'attributes' => [
                                        'name' => $user->name,                                        
                                    ]
                                ]
                            ],
                        // 'answered_question' => [
                        //     'data' => [
                        //         'attributes' => [
                        //             'question_id' => $answer->question_id,
                        //         ]
                        //     ]
                        // ],
                            'content' => 'Answer content',
                            'answered_at' => $answer->created_at->diffForHumans(),
                            ]
                        ],
                        'links' => [
                            'self' => url('/questions/123'),
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/questions'),
                ]
            ]);

    }

    // /** @test */
    // public function a_user_can_create_an_answer()
    // {
    //     $this->withoutExceptionHandling();

    //     $this->actingAs($user = User::factory()->create(), 'api');

    //     $question = Question::factory()->create(['id' => 123]);

    //     $response = $this->post('/api/answers', [
    //         'data' => [
    //             'type' => 'answers',
    //             'attributes' => [
    //                 'content' => 'Answer content',
    //             ]
    //         ]
    //     ]);

    //     $answer = Answer::first();

    //     $this->assertCount(1, Answer::all());

    //     // dd($answer);

    //     // $this->assertCount(1, Answer::all());
        
    //     // $this->assertEquals($question->id, $answer->question_id);
    //     $this->assertEquals($user->id, $answer->user_id);
    //     $this->assertEquals('Answer content', $answer->content);

    //     $response->assertStatus(201)
    //         ->assertJson([
    //             'data' => [
    //                 'type' => 'answers',
    //                 'answer_id' => $answer->id,
    //                 'attributes' => [
    //                     'answered_by' => [
    //                         'data' => [
    //                             'attributes' => [
    //                                 'name' => $user->name,
    //                             ]
    //                         ]
    //                     ],
    //                     'answered_question' => [
    //                         'data' => [
    //                             'attributes' => [
    //                                 'question_id' => $answer->question_id,
    //                             ]
    //                         ]
    //                     ],
    //                     'content' => 'Answer content',
    //                 ]
    //             ],
    //             'links' => [
    //                 'self' => url('/answers/'.$answer->id),
    //             ]
    //         ]);

    // }
}
