<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrieveQuestionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_retrieve_questions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create(), 'api');
        $questions = Question::factory()->count(2)->create();

        $response = $this->get('/api/questions');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'questions',
                            'question_id' => $questions->last()->id,
                            'attributes' => [
                                'title' => $questions->last()->title,
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'questions',
                            'question_id' => $questions->first()->id,
                            'attributes' => [
                                'title' => $questions->first()->title,
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/questions')
                ]
            ]);
    }

    /** @test */
    // public function a_user_can_retrieve_their_posts()
    // {
    //     $this->actingAs($user = User::factory()->create(), 'api');
    //     $questions = Question::factory()->create();

    //     $response = $this->get('/api/questions');

    //     $response->assertStatus(200)
    //         ->assertExactJson([
    //             'data' => [],
    //             'links' => [
    //                 'self' => url('/questions'),
    //             ]
    //         ]);

    // }
}
