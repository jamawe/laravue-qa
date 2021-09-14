<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserQuestionController;
use App\Http\Controllers\AuthUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    // Any route inside this callback will be protected by the api

    Route::get('/auth-user', [AuthUserController::class, 'show']);

    Route::apiResources([
        '/questions' => QuestionController::class,
        '/users' => UserController::class,
        '/users/{user}/questions' => UserQuestionController::class,
    ]);

});
