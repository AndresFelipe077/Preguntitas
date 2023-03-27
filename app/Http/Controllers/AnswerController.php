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
            'body' => 'required|min:5'
        ]);

        $answer = new Answer();
        $answer->body = $validatedData['body'];
        $answer->user_id = auth()->user()->id;
        $answer->question_id = $question->id;
        $answer->save();

        return redirect()->route('questions.show', $question)
            ->with('success', 'Answer submitted successfully.');
    }

    // public function edit(Answer $answer)
    // {
    //     return view('answers.edit', compact('answer'));
    // }

    public function edit(Question $question, Answer $answer)
    {
        return view('answers.edit', compact('question', 'answer'));
    }

    // public function update(Request $request, Answer $answer)
    // {
    //     $validatedData = $request->validate([
    //         'body' => 'required|min:5'
    //     ]);

    //     $answer->body = $validatedData['body'];
    //     $answer->save();

    //     return redirect()->route('questions.show', $answer->question_id)
    //         ->with('success', 'Answer updated successfully.');
    // }

    public function update(Request $request, Question $question, Answer $answer)
    {
        $validatedData = $request->validate([
            'body' => 'required',
            'correct' => 'nullable|boolean'
        ]);
    
        $answer->update($validatedData);
    
        if ($request->has('correct')) {
            $question->markAsCorrect($answer);
        }
    
        return redirect()->route('questions.show', $question);
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('questions.show', $answer->question)->with('success', 'Answer deleted successfully.');
    }
}
