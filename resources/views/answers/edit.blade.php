<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Respuestas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    {{-- <h1>Edit Answer</h1>

    <form method="POST" action="{{ route('answers.update', $answer) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="body">Answer</label>
            <textarea class="form-control" name="body" id="body" rows="3">{{ $answer->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form> --}}


    <h1>Edit Answer</h1>

    <form action="{{ route('answers.update', [$question, $answer]) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body" rows="5" required>{{ $answer->body }}</textarea>
        </div>
    
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="correct" name="correct" {{ $answer->correct ? 'checked' : '' }}>
            <label class="form-check-label" for="correct">Mark as correct answer</label>
        </div>
    
        <button type="submit" class="btn btn-primary">Update Answer</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
