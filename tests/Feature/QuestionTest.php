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
        $this->withoutExceptionHandling();
        
        $this->actingAs($user = User::factory()->create(), 'api');

        $response = $this->post('/api/questions', [
            'data' => [
                'type' => 'questions',
                'attributes' => [
                    'title' => 'Testing Title'
                ]
            ]
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

    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
