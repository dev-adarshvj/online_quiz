<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;


Route::get('/create', QuizController::class.'@create')->name('create');
Route::post('/save-question', QuizController::class.'@store')->name('save-question');
Route::get('/', QuizController::class.'@takeQuiz')->name('take-quiz');
Route::post('/submit-quiz', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
