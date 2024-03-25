<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Texto;
use App\Models\Pregunta;
use App\Models\Respuesta;

class SimulacroController extends Controller
{
    public function start(){
        return view('start/inicio');
    }

    public function simulacro(){
        return view('simulacro/simulacro');
    }

    public function list_simulacro($value){
        return view('simulacro/list_simulacro');
    }

    public function create_simulacro($value){
        $textos = Texto::where('estado','=',1)->get();
        $minId = $textos->min('id');
        $maxId = $textos->max('id');
        
        $texto_1 = null;
    
        do {
            $id_texto_1 = rand($minId, $maxId);
            $texto_1 = Texto::find($id_texto_1);
        } while (!$texto_1 && $minId <= $maxId);
    
        $preguntas_texto_1 = $texto_1->preguntas()->where('estado', 1)->get();
        
        $preguntas_texto_1_con_respuestas = [];

        foreach ($preguntas_texto_1 as $pregunta_texto_1) {
            $respuesta_texto_1 = $pregunta_texto_1->respuesta;

            $preguntas_texto_1_con_respuestas[] = [
                'pregunta' => $pregunta_texto_1,
                'respuesta' => $respuesta_texto_1
            ];
        }

        $texto_2 = null;
    
        do {
            $id_texto_2 = rand($minId, $maxId);
            $texto_2 = Texto::find($id_texto_2);
        } while ((!$texto_2 || $texto_2->id === $id_texto_1) && $minId <= $maxId);
    
        $preguntas_texto_2 = $texto_2->preguntas()->where('estado', 1)->get();
        
        $preguntas_texto_2_con_respuestas = [];

        foreach ($preguntas_texto_2 as $pregunta_texto_2) {
            $respuesta_texto_2 = $pregunta_texto_2->respuesta;

            $preguntas_texto_2_con_respuestas[] = [
                'pregunta' => $pregunta_texto_2,
                'respuesta' => $respuesta_texto_2
            ];
        }

        dd($preguntas_texto_1_con_respuestas,$preguntas_texto_2_con_respuestas);
    }
}
