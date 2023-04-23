@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <a href="{{ route('home') }}" class="btn btn-success">Home</a>

                    <div class="card-header h1">{{ __('QUIZ') }}</div>

                    <div class="card-body">


                        <h1>Edit Quiz</h1>

                        <form action="{{ route('quiz.update', $quiz) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Titulo:</label>
                                <textarea class="form-control" id="title" name="title" rows="5" required>{{ $quiz->title }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="description">Body:</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $quiz->description }}</textarea>
                            </div>

                            {{-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="correct" name="correct"
                                    {{ $quiz->correct ? 'checked' : '' }}>
                                <label class="form-check-label" for="correct">Mark as correct answer</label>
                            </div> --}}

                            <button type="submit" class="btn btn-primary">Update Answer</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
