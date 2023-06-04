<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function index($quiz)
    {
        return view('questions.show')->with('quiz', $quiz);
    }

    public function create(Quiz $quiz)
    {
        return view('questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Crear una nueva pregunta asociada al quiz
        $question = new Question();
        $question->title = $validatedData['title'];
        $question->quiz_id = $quiz->id;
        // dd($quiz->id);
        $question->save();

        // Redirigir al usuario a la página del quiz
        return redirect()->route('quiz.show', $quiz);
    }


    // public function show(Question $question)
    // {

    //     // Obtén el quiz relacionado con la pregunta
    //     $quiz = $question->quiz;

    //     // Obtén las respuestas relacionadas con la pregunta
    //     $answers = $question->answers;

    //     // Retornar la vista con el quiz y las preguntas
    //     return view('questions.show', compact('question', 'answers', 'quiz'));
    // }


    public function show(Question $question)
    {
        // Obtén el quiz relacionado con la pregunta
        $quiz = $question->quizzes;
        // return $quiz;

        // Obtén las respuestas relacionadas con la pregunta
        $answers = $question->answers;

        // Retornar la vista con el quiz, la pregunta y las respuestas
        return view('questions.show', compact('quiz', 'question', 'answers'));
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
