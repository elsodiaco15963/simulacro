<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Texto;
use App\Models\Pregunta;
use App\Models\Respuesta;

class PreguntaController extends Controller
{
    public function question(){
        return view('question/question');
    }
    public function list_question($value)
    {
        $preguntas = Pregunta::where('estado', '=', 1)
                        ->where('universidad','=',$value)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('question/list_question',compact('preguntas'));
    }

    public function create_question($value){
        return view('question/form_question');
    }

    public function store_question(Request $request,$value) {
        $texto=$request->texto;
        if($texto != "Texto"){

            $pregunta = new Pregunta();
            $pregunta->universidad = $value;
            $pregunta->año = $request->input('año');
            $pregunta->asignatura = $request->input('asignatura');
            $pregunta->tema = $request->input('tema');
            $pregunta->pregunta = $request->input('pregunta.0');

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = 'pregunta_' . time() . '.' . $imagen->getClientOriginalExtension();
                $rutaImagen = $imagen->move(public_path('imagenes/pregunta'), $nombreImagen);
                $pregunta->imagen = 'imagenes/pregunta/' . $nombreImagen;
            }

            $pregunta->save();

            $pregunta_id = $pregunta->id;

            $respuesta = new Respuesta();
            $respuesta->opcion_1 = $request->input('opcion_1.0');
            $respuesta->opcion_2 = $request->input('opcion_2.0');
            $respuesta->opcion_3 = $request->input('opcion_3.0');
            $respuesta->opcion_4 = $request->input('opcion_4.0');
            $respuesta->opcion_5 = $request->input('opcion_5.0');
            $respuesta->correcta = $request->input('correcta.0');
            $respuesta->pregunta_id = $pregunta_id;

            if ($request->hasFile('resolucion')) {
                $imagen = $request->file('resolucion');
                $nombreImagen = 'resolucion_' . time() . '.' . $imagen->getClientOriginalExtension();
                $rutaImagen = $imagen->move(public_path('imagenes/resolucion'), $nombreImagen);
                $respuesta->resolucion = 'imagenes/resolucion/' . $nombreImagen;
            }
            $respuesta->save();
        }else {
            $texto = new Texto();
            $texto->universidad = $value;
            $texto->año = $request->input('año');
            $texto->texto = $request->input('texto');
            $texto->save();

            $texto_id = $texto->id;

            for ($i = 1; $i < 6; $i++) {

                $pregunta = new Pregunta();
                $pregunta->universidad = $value;
                $pregunta->asignatura = $request->input('asignatura');
                $pregunta->tema = $request->input('tema');
                $pregunta->año = $request->input('año');
                $pregunta->pregunta = $request->input('pregunta.' . $i);
                $pregunta->texto_id = $texto_id;

                $pregunta->save();

                $pregunta_id = $pregunta->id;

                $respuesta = new Respuesta();
                $respuesta->opcion_1 = $request->input('opcion_1.' . $i);
                $respuesta->opcion_2 = $request->input('opcion_2.' . $i);
                $respuesta->opcion_3 = $request->input('opcion_3.' . $i);
                $respuesta->opcion_4 = $request->input('opcion_4.' . $i);
                $respuesta->opcion_5 = $request->input('opcion_5.' . $i);
                $respuesta->correcta = $request->input('correcta.' . $i-1);
                $respuesta->pregunta_id = $pregunta_id;

                $respuesta->save();
            }
        }
        return redirect()->route('list_question', $value)->with('success', 'Registrado exitosamente');

    }
    
    public function edit_question($id){
        $pregunta = Pregunta::find($id);
        return view('question/edit_form_question',compact('pregunta'));
    }
}
