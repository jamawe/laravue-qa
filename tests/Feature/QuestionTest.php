<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Question;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_post_a_question()
    {
        
        $this->actingAs($user = User::factory()->create(), 'api');

        $response = $this->post('/api/questions', [
            'title' => 'Testing Title',
        ]);

        $question = Question::first();

        $this->assertCount(1, Question::all());

        $this->assertEquals($user->id, $question->user_id);
        $this->assertEquals('Testing Title', $question->title);


        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'questions',
                    'question_id' => $question->id,
                    'attributes' => [
                        'asked_by' => [
                            'data' => [
                                'attributes' => [
                                    'name' => $user->name,
                                ]
                            ]
                        ],
                        'title' => 'Testing Title',
                    ]
                ],
                'links' => [
                    'self' => url('/questions/'.$question->id),
                ]
            ]);

    }

    /** @test */
    public function a_user_can_post_a_question_with_description()
    {
        // $this->withoutExceptionHandling();
        
        $this->actingAs($user = User::factory()->create(), 'api');

        $response = $this->post('/api/questions', [
                    'title' => 'Testing Title',
                    'description' => 'A very nice Description',
        ]);

        $question = Question::first();

        // dd($question);

        $this->assertCount(1, Question::all());

        $this->assertEquals($user->id, $question->user_id);
        $this->assertEquals('Testing Title', $question->title);
        $this->assertEquals('A very nice Description', $question->description);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'questions',
                    'question_id' => $question->id,
                    'attributes' => [
                        'title' => 'Testing Title',
                        'description' => 'A very nice Description',
                    ]
                ],
                'links' => [
                    'self' => url('/questions/'.$question->id),
                ]
            ]);

    }

}
