<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $question->title }}</h1>
    <p>{{ $question->body }}</p>
    <p>Author: {{ $question->user->name }}</p>
    <p>Created At: {{ $question->created_at }}</p>

    <hr>

    <h2>Answers</h2>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
