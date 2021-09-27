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
        $question = Question::factory()->create(['id' => 124]);

        $response = $this->json('post', '/api/questions/'.$question->id.'/answer', [
            'body' => '',
        ])->assertStatus(422);


        // dd($response->getContent());
        // json_decodes formes an object out of json; true parameter formes an array
        // Arrays are easier to assert on
        $responseString = json_decode($response->getContent(), true);

        // dd($responseString);
        $this->assertArrayHasKey('body', $responseString['errors']);
    }


}
