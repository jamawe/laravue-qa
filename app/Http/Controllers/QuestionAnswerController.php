<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerCollection;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    public function store(Question $question)
    {
        $data = request()->validate([
            'content' => '',
        ]);

        $question->answers()->create(array_merge($data, [
            'user_id' => auth()->user()->id,
        ]));

        return new AnswerCollection($question->answers);
    }
}
