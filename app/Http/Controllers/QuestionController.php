<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    
    public function create(Quiz $quiz)
    {
        return view('questions.create', compact('quiz'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:30',
        ]);

        $question          = new Question();
        $question->title   = $validatedData['title'];
        $question->quiz_id = 1;
        $question->save(); // Guarda el registro en la base de datos


        return redirect()->route('quiz.show', 1)
            ->with('success', 'Answer submitted successfully.');
    }

    public function show(Question $question)
    {
        // Obtén las preguntas relacionadas con el quiz
        $answers = $question->answers;

        // Retornar la vista con el quiz y las preguntas
        return view('questions.show', compact('question', 'answers'));
    }


    public function edit(Quiz $quiz, Question $question)
    {
        return view('questions.edit', compact('quiz', 'question'));
    }


    public function update(Request $request, Quiz $quiz, Question $question)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        $question->update($validatedData);


        return redirect()->route('quiz.show', 1);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.show', $question->quiz)->with('success', 'Answer deleted successfully.');
    }
}
