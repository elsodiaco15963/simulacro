<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulacroController extends Controller
{
    public function start(){
        return view('start/inicio');
    }

    public function simulacro(){
        return view('simulacro/simulacro');
    }

    public function list_simulacro($value){
        dd($value);
        return view('simulacro/list_simulacro');
    }
}
