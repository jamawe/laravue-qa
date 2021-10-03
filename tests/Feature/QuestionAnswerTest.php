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
        $this->actingAs($user = User::factory()->create(), 'api');
        $question = Question::factory()->create(['id' => 123]);

        $response = $this->post('/api/questions/'.$question->id.'/answer', [
            'body' => 'Answer body',
        ])
            ->assertStatus(200);

        $answer = Answer::first();
        $this->assertCount(1, Answer::all());
        
        $this->assertEquals($question->id, $answer->question_id);
        $this->assertEquals($user->id, $answer->user_id);
        $this->assertEquals('Answer body', $answer->body);

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
                            'body' => 'Answer body',
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

    /** @test */
    public function a_body_is_required_to_answer_a_question()
    {
        // $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create(), 'api');
        $question = Question::factory()->create(['id' => 123]);

        $response = $this->json('post', '/api/questions/'.$question->id.'/answer', [
            'body' => '',
        ])->assertStatus(422);

        // json_decodes formes an object out of json; true parameter formes an array
        // Arrays are easier to assert on
        $responseString = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('body', $responseString['errors']);
    }

    /** @test */
    public function questions_are_returned_with_answers()
    {
        // $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create(), 'api');
        $question = Question::factory()->create(['id' => 123, 'user_id' => $user->id]);

        // dd($question);

        $this->json('post', '/api/questions/'.$question->id.'/answer', [
            'body' => 'A great answer!',
        ]);

        $response = $this->get('/api/questions');

        // dd($response);

        $answer = Answer::first();
        
        // dd($question);
        // dd($answer);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'questions',
                            'attributes' => [
                                'answers' => [
                                    'data' => [
                                        [
                                            'data' => [
                                                'type' => 'answers',
                                                'answer_id' => 1,
                                                'attributes' => [
                                                    'answered_by' => [
                                                        'data' => [
                                                            'user_id' => $user->id,
                                                            'attributes' => [
                                                                'name' => $user->name,                                        
                                                            ]
                                                        ]
                                                    ],
                                                    'body' => 'A great answer!',
                                                    'answered_at' => $answer->created_at->diffForHumans(),
                                                ]
                                            ],
                                            'links' => [
                                                'self' => url('/questions/123'),
                                            ]
                                        ]
                                    ],
                                    'answer_count' => 1,
                                ]
                            ]
                        ]
                        
                    ]
                ]
            ]);
    }

    /** @test */
    public function a_user_can_view_a_single_question_with_answers()
    {
        $this->actingAs($user = User::factory()->create(), 'api');
        $question = Question::factory()->create(['id' => 123, 'user_id' => $user->id]);

        // dd($question);

        $this->json('post', '/api/questions/'.$question->id.'/answer', [
            'body' => 'A great answer!',
        ]);

        $response = $this->get('/api/questions/'.$question->id);

        $answer = Answer::first();

        // dd($response);
        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'type' => 'questions',
                    'attributes' => [
                        'answers' => [
                            'data' => [
                                [
                                    'data' => [
                                        'type' => 'answers',
                                        'answer_id' => 1,
                                        'attributes' => [
                                            'answered_by' => [
                                                'data' => [
                                                    'user_id' => $user->id,
                                                    'attributes' => [
                                                        'name' => $user->name,                                        
                                                    ]
                                                ]
                                            ],
                                            'body' => 'A great answer!',
                                            'answered_at' => $answer->created_at->diffForHumans(),
                                        ]
                                    ],
                                    'links' => [
                                        'self' => url('/questions/123'),
                                    ]
                                ]
                            ],
                            'answer_count' => 1,
                        ]
                    ]
                ]
            ]);
    }

    // a_question_is_returned_with_answers

    // 


}
