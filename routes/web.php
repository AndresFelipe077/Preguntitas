<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas para preguntas
Route::controller(QuestionController::class)->group(function (){
    Route::get('/questions', 'index')->name('questions.index');
    Route::get('/questions/create', 'create')->name('questions.create');
    Route::post('/questions', 'store')->name('questions.store');
    Route::get('/questions/{question}', 'show')->name('questions.show');
    Route::get('/questions/{question}/edit', 'edit')->name('questions.edit');
    Route::put('/questions/{question}', 'update')->name('questions.update');
    Route::delete('/questions/{question}', 'destroy')->name('questions.destroy');
});

// Rutas para respuestas
Route::controller(AnswerController::class)->group(function (){
    Route::get('/questions/{question}/answers/create', 'create')->name('answers.create');
    Route::post('/questions/{question}/answers', 'store')->name('answers.store');
    Route::get('/questions/{question}/answers/{answer}/edit', 'edit')->name('answers.edit');
    Route::put('/questions/{question}/answers/{answer}', 'update')->name('answers.update');
    Route::delete('/answers/{answer}', 'destroy')->name('answers.destroy');
});



