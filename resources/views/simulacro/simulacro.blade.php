@extends('template')

@section('content')
    <div class="simulacro-container">
        <div class="universidad-container">
            <a href="{{ route('list_simulacro', ['value' => 'untels']) }}">
                <div class="columna">
                    <img src="{{ asset('assets/image/logo_untels.png') }}" class="normal">
                    <img src="{{ asset('assets/image/untels.png') }}" class="reducido">
                </div>
            </a>
            <div class="columna">
                <p class="normal">Proximamente<p>
                <p class="reducido">Proximo<p>
            </div>
        </div>
    </div>
@endsection
