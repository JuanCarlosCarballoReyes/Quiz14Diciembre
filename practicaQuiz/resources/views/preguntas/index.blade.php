@extends('app.base')
@section('title', 'Argo Create Preguntas')
@section('content')

<h2>Questions</h2>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pregunta</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($preguntas as $pregunta)
                <tr>
                    <td>{{ $pregunta->id }}</td>
                    <td>{{ $pregunta->pregunta }}</td>
                    
                              <td>
                        <!--<a href="{{ url('preguntas/' . $pregunta->id) }}" class="btn btn-primary">View</a>-->
                        <a href="{{ url('preguntas/' . $pregunta->id . '/edit')}}" class="btn btn-success"><i class="fa fa-magic"></i>Edit</a> 
       <form class="formDelete" action="{{ url('preguntas/' . $pregunta->id) }}" method="post" style="display: inline-block">
    @csrf
    @method('delete')
    <button class="btn-danger btn" type="submit">Delete</button>
</form>

                </td>
            </tr>
            @endforeach

</tbody>
</table>

             <a class="btn-primary btn" href="{{ url('preguntas/create') }}"><i class="fa fa-plus"></i>Link to create</a>
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
