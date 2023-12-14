<?php

namespace App\Http\Controllers;
use App\Models\Respuestas;
use Illuminate\Http\Request;

class RespuestasController extends Controller
{
    public function index()
    {
       
        $respuestas = Respuestas::all();
    
        return view('respuestas.index', ['respuestas' => $respuestas]);
    }

    public function create()
    {
        return view('respuestas.create');
    }

    public function store(Request $request)
    {
        //1º generar el objeto para guardar
        
        $respuestas = new Respuestas($request->all());
        
         
        try{
            //2º intentar guardar el objeto
             $result = $respuestas->save();
             //3º si se guarda volver algun sitio : index , create
             
             
             $checked = session('afterInsert', 'show answer');
            $target='respuestas';
        
        if($checked != 'show answer'){
            $target = $target.'/create';
           
        }
                  $this->validate($request, [
                        'respuesta' => 'required|max:255', // Limita el título a 255 caracteres
                         'esCorrecta' => 'required|max:1|numeric',
                           'id_pregunta' => 'required|numeric'
            ]);
    
             return redirect($target)->with(['message'=> 'The answer has been seaved']);
        }catch(\Exception $e){
             //4º Si no lo he guardado volver para tras con los datoas rellenos
            return back() -> withInput()->withErrors(['message'=> 'The answer has not been seaved']);
        }
    }
    public function edit(Respuestas $respuestas)
    {
      return view('respuestas.edit', ['respuesta' => $respuestas]);
    }
   public function show(Respuestas $respuestas)
    {
         return view('respuestas.show', ['respuesta' => $respuestas]);
    }
public function update(Request $request, Respuestas $respuestas)
    {
        try {
            // Actualizar los campos con los nuevos datos del formulario
            $respuestas->fill($request->all());

            // Intentar guardar los cambios
            $result = $respuestas->save();
            $this->validate($request, [
                        'respuesta' => 'required|max:255', // Limita el título a 255 caracteres
                        'esCorrecta' => 'required|numeric',
                        'id_pregunta' => 'required|numeric'
                         
            ]);
    
            return redirect('respuestas')->with(['message' => 'The answer has been updated']);
            
            // Si se guardó correctamente, redirigir a alguna vista, por ejemplo, la lista de juegos
        } catch (\Exception $e) {
            // En caso de error al guardar, regresar a la página anterior con los datos para corregir
            return back()->withInput()->withErrors(['message' => 'The answer has not been updated']);
        }
    }
    public function destroy(Respuestas $respuestas)
    {
        try {
            $respuestas->delete();
            return redirect('respuestas')->with(['message' => 'The answer has been deleted.']);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'The answer has not been deleted.']);
        }
    }
}
