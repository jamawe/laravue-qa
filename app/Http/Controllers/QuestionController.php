<?php

namespace App\Http\Controllers;

use App\Http\Resources\Question as QuestionResource;
use App\Http\Resources\QuestionCollection;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return new QuestionCollection(Question::all());
    }
    
    public function store()
    {
        $data = request()->validate([
            'data.attributes.title' => '',
        ]);

        $question = request()->user()->questions()->create($data['data']['attributes']);

        return new QuestionResource($question);
    }
}