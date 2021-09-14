<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCanViewProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_user_profiles()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create(), 'api');
        $questions = Question::factory()->create();

        $response = $this->get('/api/users/'.$user->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'type' => 'users',
                    'user_id' => $user->id,
                    'attributes' => [
                        'name' => $user->name,
                    ]
                ],
                'links' => [
                    'self' => url('/users/'.$user->id),
                ]
            ]);
    }

    /** @test */
    public function a_user_can_fetch_questions_for_a_profile()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create(), 'api');
        $question = Question::factory()->create(['user_id' => $user->id]);

        $response = $this->get('/api/users/'.$user->id.'/questions');

        $response->assertStatus(200)
            ->assertJson([
               'data' => [
                   [
                        'data' => [
                            'type' => 'questions',
                            'question_id' => $question->id,
                            'attributes' => [
                                'title' => $question->title,
                                'description' => $question->description,
                                'posted_at' => $question->created_at->diffForHumans(),
                                'updated_at' => $question->updated_at->diffForHumans(),
                                'asked_by' => [
                                    'data' => [
                                        'attributes' => [
                                            'name' => $user->name,
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        'links' => [
                            'self' => url('/questions/'.$question->id),
                        ]
                   ]
               ]
            ]);
    }
}
