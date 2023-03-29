@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('QUESTIONS') }}</div>

                    <div class="card-body">
                        <div class="">
                            <h1>{{ $question->title }}</h1>
                            <p>{{ $question->body }}</p>
                            <p>Author: {{ $question->user->name }}</p>
                            <p>Created At: {{ $question->created_at }}</p>

                            <hr>

                            <h2>Answers</h2>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (count($question->answers) > 0)
                            @foreach ($question->answers as $answer)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p>{{ $answer->body }}</p>
                                        <p>Author: {{ $answer->user->name }}</p>
                                        <p>Created At: {{ $answer->created_at }}</p>
                                    </div>
                                    {{ $question->id }}
                                    {{ $answer->id }}
                                    {{-- <a href="{{ route('answers.edit'), $question->id, $answer->id }}" class="btn btn-danger"> Editar respuesta </a> --}}
                                </div>
                            @endforeach
                        @else
                            <p>No answers yet.</p>
                        @endif

                        <a href="{{ route('answers.create', $question) }}" class="btn btn-primary">Add Answer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
