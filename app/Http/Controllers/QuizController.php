<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
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
        $quiz->save();
        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully.');
    }
}
