@extends('app.base')

@section('title', 'Edit Respuesta')

@section('content')

   <form action="{{ url('admin/' . $respuesta->id) }}" method="post">
    @csrf
    @method('put')
    <!-- Resto del formulario -->

        <!-- Inputs del formulario -->
        <div class="mb-3">
            <label for="respuesta" class="form-label">Respuesta</label>
            <input type="text" class="form-control" id="respuesta" name="respuesta" maxlength="60" required value="{{ old('respuesta', $respuesta->respuesta) }}">
        </div>

      

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ url('admin/respuestas') }}" class="btn btn-primary">Back</a>
        <a href="{{ url('admin/respuestas' . $respuesta -> id) }}" class="btn btn-primary">View</a>
         
      
    
    </form>         <form class="formDelete" action="{{ url('admin/respuestas' . $respuesta->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn-danger btn" type="submit" >Delete</button>
                    </form>
       
    <script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
    

</script>    
@endsection

