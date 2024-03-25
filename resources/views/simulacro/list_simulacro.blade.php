@extends('template')

@section('content')
    <div class="contenedor_list_viaje">
        <div>
            <a class="btn btn-green btn-nuevo-usuario" href="{{ route('create_simulacro', ['value' => 'untels']) }}">Nuevo Simulacro</a>
        </div><br>
    </div>
@endsection
