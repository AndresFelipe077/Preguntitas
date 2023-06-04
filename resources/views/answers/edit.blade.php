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

    <h1>Edit Answer</h1>

    {{-- <form action="{{ route('answers.update', $answer) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="content">Respuesta:</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $answer->content }}</textarea>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_correct" name="is_correct"
                {{ $answer->is_correct ? 'checked' : '' }}>
            <label class="form-check-label" for="is_correct">Respuesta correcta</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Answer</button>
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-danger">Regresar</a>

    </form> --}}

    <form action="{{ route('answers.update', $answer) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="content">Respuesta:</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $answer->content }}</textarea>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_correct" name="is_correct" value="1"
                {{ $answer->is_correct ? 'checked' : '' }}>
            <label class="form-check-label" for="is_correct">Respuesta correcta</label>
        </div>


        <button type="submit" class="btn btn-primary">Actualizar respuesta</button>
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-danger">Regresar</a>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
