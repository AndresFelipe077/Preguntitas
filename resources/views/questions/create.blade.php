@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('QUESTIONS') }}</div>

                    <div class="card-body">
                        <h1>Create Question</h1>
                        {{-- Debo agregar el id de la relacion para agregar la pregunta ahi --}}
                        <form action="{{ route('questions.store', ['quiz' => $quiz->id]) }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="quiz_id" value="{{ $quiz_id }}"> --}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
