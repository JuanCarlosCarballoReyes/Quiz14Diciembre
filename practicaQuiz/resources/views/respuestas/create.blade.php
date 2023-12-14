@extends('app.base')
@section('title', 'Argo Create Respuestas')
@section('content')
    <h2>Create Answer</h2>

    <form action="{{ url('respuestas') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="respuesta" class="form-label">Respuesta</label>
            <input type="text" class="form-control" id="respuesta" name="respuesta"  required value="{{ old('respuesta') }}">
        </div>
        <div class="mb-3">
            <label for="esCorrecta" class="form-label">esCorrecta</label>
            <input type="number" class="form-control" id="esCorrecta" name="esCorrecta"  required value="{{ old('esCorrecta') }}">
        </div>
            <div class="mb-3">
            <label for="respuesta" class="form-label">id_pregunta</label>
            <input type="number" class="form-control" id="id_pregunta" name="id_pregunta"  required value="{{ old('id_pregunta') }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>

@endsection
