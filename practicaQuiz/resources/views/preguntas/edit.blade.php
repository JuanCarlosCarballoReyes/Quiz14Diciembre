@extends('app.base')

@section('title', 'Edit Preguntas')

@section('content')

<form action="{{ url('preguntas/' . $preguntas->id) }}" method="post">
    @csrf
    @method('put')
    <!-- Resto del formulario -->

    <!-- Inputs del formulario -->
    <div class="mb-3">
        <label for="pregunta" class="form-label">Pregunta</label>
        <input type="text" class="form-control" id="pregunta" name="pregunta" maxlength="60" required value="{{ old('pregunta', $preguntas->pregunta) }}">
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{ url('preguntas') }}" class="btn btn-primary">Back</a>
</form>

<form class="formDelete" action="{{ url('preguntas/' . $preguntas->id) }}" method="post" style="display: inline-block">
    @csrf
    @method('delete')
    <button class="btn-danger btn" type="submit">Delete</button>
</form>

<script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function (form) {
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
</script>
@endsection
