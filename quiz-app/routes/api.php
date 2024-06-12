<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ResultController;

// Route::post('/register', [RegisteredUserController::class, 'store']);
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::middleware('auth:sanctum')->post('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::apiResource('quizzes', QuizController::class)->names([
    'index' => 'quizzes.index',
    'show' => 'quizzes.show',
    'store' => 'quizzes.store',
    'update' => 'quizzes.update',
    'destroy' => 'quizzes.destroy'
]);

Route::apiResource('questions', QuestionController::class)->names([
    'index' => 'questions.index',
    'show' => 'questions.show',
    'store' => 'questions.store',
    'update' => 'questions.update',
    'destroy' => 'questions.destroy'
]);

Route::apiResource('answers', AnswerController::class)->names([
    'index' => 'answers.index',
    'show' => 'answers.show',
    'store' => 'answers.store',
    'update' => 'answers.update',
    'destroy' => 'answers.destroy'
]);

Route::apiResource('results', ResultController::class)->names([
    'index' => 'results.index',
    'show' => 'results.show',
    'store' => 'results.store',
    'update' => 'results.update',
    'destroy' => 'results.destroy'
]);
