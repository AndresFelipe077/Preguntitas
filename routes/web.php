<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizResultController;
use Illuminate\Support\Facades\Auth;
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

// Rutas para Quizzes
Route::controller(QuizController::class)->group(function (){
    Route::get('/quizzes', 'index')->name('quiz.index');
    Route::get('/quizzes/create', 'create')->name('quiz.create');
    Route::post('/quizzes', 'store')->name('quiz.store');
    Route::get('/quiz/{quiz}', 'show')->name('quiz.show');
    Route::get('/quiz/{quiz}/edit', 'edit')->name('quiz.edit');
    Route::put('/quiz/{quiz}', 'update')->name('quiz.update');
    Route::delete('/quiz/{quiz}', 'destroy')->name('quiz.destroy');

    Route::get('/quiz/{quiz}/response', 'showQuiz')->name('quiz_responder.show');

    // Route::post('/quiz/submit', 'submit')->name('quiz.submit');

    Route::post('/quiz/{quiz}/submit', 'submit')->name('quiz.submit');


});

// Rutas para preguntas
Route::controller(QuestionController::class)->group(function (){
    Route::get('/quizzes/questions', 'index')->name('questions.index');
    Route::get('/quizzes/{quiz}/questions/create', 'create')->name('questions.create');
    Route::post('/quizzes/{quiz}/questions', 'store')->name('questions.store');
    Route::get('/question/{question}', 'show')->name('questions.show');
    Route::get('/question/{question}/edit', 'edit')->name('questions.edit');
    Route::put('/question/{question}', 'update')->name('questions.update');
    Route::delete('/question/{question}', 'destroy')->name('questions.destroy');
});

// Rutas para respuestas
Route::controller(AnswerController::class)->group(function (){
    Route::get('/questions/{question}/answers/create', 'create')->name('answers.create');
    Route::post('/questions/{question}/answers', 'store')->name('answers.store');
    Route::get('/questions/{answer}/answer/edit', 'edit')->name('answers.edit');
    Route::put('/questions/{answer}/answer/update', 'update')->name('answers.update');
    Route::delete('/answers/{question}', 'destroy')->name('answers.destroy');
});

Route::controller(QuizResultController::class)->group(function (){
    Route::get('/resultado', 'mostrarResultado')->name('resultado');
});




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
