@extends('template')

@section('content')
    <div class="contenedor_list_viaje">
        <div>
            <a class="btn btn-green btn-nuevo-usuario" href="{{ route('create_viaje') }}">Nuevo Viaje</a>
        </div><br>
    </div>
@endsection
