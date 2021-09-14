<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserQuestionController extends Controller
{
    public function index(User $user)
    {
        return new QuestionCollection($user->questions);
    }
}
