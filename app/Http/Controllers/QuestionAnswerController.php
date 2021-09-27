<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationErrorException;
use App\Http\Resources\AnswerCollection;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionAnswerController extends Controller
{
    public function store(Question $question)
    {
        $data = request()->validate([
            'body' => 'required',
        ]);

        $question->answers()->create(array_merge($data, [
            'user_id' => auth()->user()->id,
        ]));

        return new AnswerCollection($question->answers);
    }
}
