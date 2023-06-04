<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function create(Question $question)
    {
        return view('answers.create', compact('question'));
    }

    public function store(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:50'
        ]);

        $answer = new Answer();
        $answer->content = $validatedData['content'];
        $answer->question_id = $question->id;
        $answer->save();

        return redirect()->route('questions.show', $question)
            ->with('success', 'Answer submitted successfully.');
    }

    public function edit(Answer $answer)
    {
        return view('answers.edit', compact('answer'));
    }


    public function update(Request $request, Answer $answer)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:50'
        ]);

        $answer->content = $validatedData['content'];
        $answer->update();

        $question = $answer->question;

        return redirect()->route('questions.show', $question)
            ->with('success', 'Answer updated successfully.');
    }


    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('questions.show', $answer->question)->with('success', 'Answer deleted successfully.');
    }
}
