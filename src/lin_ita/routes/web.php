<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('words', WordController::class);


Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');

Route::get('/quiz/mcq', [QuizController::class, 'mcq'])->name('quiz.mcq');
Route::post('/quiz/mcq', [QuizController::class, 'mcqAnswer'])->name('quiz.mcq.answer');

Route::get('/quiz/write', [QuizController::class, 'write'])->name('quiz.write');
Route::post('/quiz/write', [QuizController::class, 'writeAnswer'])->name('quiz.write.answer');