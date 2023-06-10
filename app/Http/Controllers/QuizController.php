<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $quiz = new Quiz;
        $quiz->title       = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->user_id     = Auth::user()->id;
        $quiz->save();
        return redirect()->route('quiz.index')->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        // Obtén las preguntas relacionadas con el quiz
        $questions = $quiz->questions;

        // Retornar la vista con el quiz y las preguntas
        return view('quizzes.show', compact('quiz', 'questions'));
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $quiz->title = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->update();
        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully.');
    }


    public function showQuiz(Quiz $quiz)
    {
        return view('responder_quiz.quiz_responder', compact('quiz'));
    }



    // public function submit(Request $request, Quiz $quiz)
    // {
    //     // Validar las respuestas del usuario y calcular la puntuación
    //     $userAnswers = $request->input('answers');
    //     $questions = $quiz->questions;
    //     $score = 0;

    //     foreach ($questions as $question) {
    //         $userAnswer = $userAnswers[$question->id] ?? null;
    //         if ($userAnswer == $question->correct_answer) {
    //             $score++;
    //         }
    //     }

    //     // Crear una nueva instancia de QuizResult
    //     $quizResult = new QuizResult();
    //     $quizResult->quiz_id = $quiz->id;
    //     $quizResult->user_id = auth()->user()->id; // Si estás autenticando usuarios
    //     $quizResult->score = $score;

    //     // Almacenar la puntuación en la sesión
    //     Session::put('quiz_score', $score);

    //     // Redirigir al usuario a la página de inicio
    //     return redirect()->route('home');
    // }


    public function submit(Request $request, Quiz $quiz)
    {
        // Validar las respuestas del usuario y calcular la puntuación
        $userAnswers = $request->input('answers');
        $questions = $quiz->questions;
        $score = 0;

        foreach ($questions as $question) {
            $userAnswer = $userAnswers[$question->id] ?? null;
            $correctAnswer = $question->answers()->where('is_correct', true)->value('id');

            if ($userAnswer == $correctAnswer) {
                $score++;
            }
        }

        // Crear una nueva instancia de QuizResult
        $quizResult = new QuizResult();
        $quizResult->quiz_id = $quiz->id;
        $quizResult->user_id = auth()->user()->id; // Si estás autenticando usuarios
        $quizResult->score = $score;

        // Guardar el resultado en la base de datos
        $quizResult->save();

        // Redirigir al usuario a la página de inicio
        return redirect()->route('home');
    }

}
