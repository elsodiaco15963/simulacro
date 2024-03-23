@extends('template')

@section('content')
    <div class="question_container">
        <div class="question_create_container">
            <a href="{{ route('create_question') }}">Nuevo Viaje</a>
        </div><br>
    </div>
@endsection
