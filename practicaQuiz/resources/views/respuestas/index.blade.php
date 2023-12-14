@extends('app.base')
@section('title', 'Argo Create Respuestas') 
@section('content')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
    <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Respuestas</th>
                <th scope="col"></th>
            </tr>
        </thead>
            @foreach($respuestas as $respuesta)
                <tr>
                    <td>{{ $respuesta->id }}</td>
                    <td>{{ $respuesta->respuesta }}</td>
                    <td>{{ $respuesta->esCorrecta }}</td>
                    <td>{{ $respuesta->id_pregunta }}</td>
                              <td>
                        <!--<a href="{{ url('respuestas/' . $respuesta->id) }}" class="btn btn-primary">View</a>-->
                        <a href="{{ url('respuestas/' . $respuesta->id . '/edit')}}" class="btn btn-success"><i class="fa fa-magic"></i>Edit</a> 
<form class="formDelete" action="{{ url('respuestas/' . $respuesta->id) }}" method="post" style="display: inline-block">
    @csrf
    @method('delete')
    <button class="btn-danger btn" type="submit">Delete</button>
</form>


                </td>
            </tr>
            @endforeach
</tbody>
</table>
             <a class="btn-primary btn" href="{{ url('respuestas/create') }}"><i class="fa fa-plus"></i>Link to create</a>
            <a class="btn-primary btn" href="{{ url('admin/') }}"><i class="fa fa-plus"></i>Back</a>
                            </div> <!-- /.table-stats -->
                        </div>
                <script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
    
    
</script>        
                        
                        
            
@endsection
