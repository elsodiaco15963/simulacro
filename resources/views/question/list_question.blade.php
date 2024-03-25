@extends('template')

@section('content')
    <div class="question_container">
        <div class="question_create_container">
            <a href="{{ route('create_question', ['value' => 'untels']) }}">Nueva Pregunta</a> <Br></Br>
            Filtros de Luis
        </div>
        <div class="question_summary_container">
            @php
                $conteo_asignatura_rv = 0;
                $conteo_asignatura_rm = 0;
                $conteo_asignatura_aritmetica = 0;
                $conteo_asignatura_algebra = 0;
                $conteo_asignatura_geometria = 0;
                $conteo_asignatura_trigonometria = 0;
                $conteo_asignatura_fisica = 0;
                $conteo_asignatura_quimica = 0;
                $conteo_asignatura_biologia = 0;
                $conteo_asignatura_lenguaje = 0;
                $conteo_asignatura_literatura = 0;
                $conteo_asignatura_hp = 0;
                $conteo_asignatura_hu = 0;
                $conteo_asignatura_filosofia = 0;
                $conteo_asignatura_logica = 0;
                $conteo_asignatura_economia = 0;

                foreach ($preguntas as $pregunta) {
                    if ($pregunta->asignatura == 'RV') {
                        $conteo_asignatura_rv++;
                    }
                    if ($pregunta->asignatura == 'RM') {
                        $conteo_asignatura_rm++;
                    }
                    if ($pregunta->asignatura == 'Aritmetica') {
                        $conteo_asignatura_aritmetica++;
                    }
                    if ($pregunta->asignatura == 'Algebra') {
                        $conteo_asignatura_algebra++;
                    }
                    if ($pregunta->asignatura == 'Geometria') {
                        $conteo_asignatura_geometria++;
                    }
                    if ($pregunta->asignatura == 'Trigonometria') {
                        $conteo_asignatura_trigonometria++;
                    }
                    if ($pregunta->asignatura == 'Fisica') {
                        $conteo_asignatura_fisica++;
                    }
                    if ($pregunta->asignatura == 'Quimica') {
                        $conteo_asignatura_quimica++;
                    }
                    if ($pregunta->asignatura == 'Biologia') {
                        $conteo_asignatura_biologia++;
                    }
                    if ($pregunta->asignatura == 'Lenguaje') {
                        $conteo_asignatura_lenguaje++;
                    }
                    if ($pregunta->asignatura == 'Literatura') {
                        $conteo_asignatura_literatura++;
                    }
                    if ($pregunta->asignatura == 'HP') {
                        $conteo_asignatura_hp++;
                    }
                    if ($pregunta->asignatura == 'HU') {
                        $conteo_asignatura_hu++;
                    }
                    if ($pregunta->asignatura == 'Filosofia') {
                        $conteo_asignatura_filosofia++;
                    }
                    if ($pregunta->asignatura == 'Logica') {
                        $conteo_asignatura_logica++;
                    }
                    if ($pregunta->asignatura == 'Economia') {
                        $conteo_asignatura_economia++;
                    }
                }
            @endphp
            <table class="question_summary_table">
                <thead>
                    <tr>
                        <td colspan="4" style="text-align: center">Cantidad de Preguntas</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RV:</td>
                        <td>
                            {{ $conteo_asignatura_rv }}
                        </td>
                        <td>RM:</td>
                        <td>
                            {{ $conteo_asignatura_rm }}
                        </td>
                    </tr>
                    <tr>
                        <td>Aritmetica:</td>
                        <td>
                            {{ $conteo_asignatura_aritmetica }}
                        </td>
                        <td>Algebra:</td>
                        <td>
                            {{ $conteo_asignatura_algebra }}
                        </td>
                    </tr>
                    <tr>
                        <td>Geometria:</td>
                        <td>
                            {{ $conteo_asignatura_geometria }}
                        </td>
                        <td>Trigonometria:</td>
                        <td>
                            {{ $conteo_asignatura_trigonometria }}
                        </td>
                    </tr>
                    <tr>
                        <td>Fisica:</td>
                        <td>
                            {{ $conteo_asignatura_fisica }}
                        </td>
                        <td>Quimica:</td>
                        <td>
                            {{ $conteo_asignatura_quimica }}
                        </td>
                    </tr>
                    <tr>
                        <td>Biologia:</td>
                        <td>
                            {{ $conteo_asignatura_biologia }}
                        </td>
                        <td>Lenguaje:</td>
                        <td>
                            {{ $conteo_asignatura_lenguaje }}
                        </td>
                    </tr>
                    <tr>
                        <td>Literatura:</td>
                        <td>
                            {{ $conteo_asignatura_literatura }}
                        </td>
                        <td>H. del Peru:</td>
                        <td>
                            {{ $conteo_asignatura_hp }}
                        </td>
                    </tr>
                    <tr>
                        <td>H. Universal:</td>
                        <td>
                            {{ $conteo_asignatura_hu }}
                        </td>
                        <td>Filosofia:</td>
                        <td>
                            {{ $conteo_asignatura_filosofia }}
                        </td>
                    </tr>
                    <tr>
                        <td>Logica:</td>
                        <td>
                            {{ $conteo_asignatura_logica }}
                        </td>
                        <td>Economia:</td>
                        <td>
                            {{ $conteo_asignatura_economia }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><br>
        <div class="question_list_container">
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Año</td>
                        <td>Asignatura</td>
                        <td>Tema</td>
                        <td>Pregunta</td>
                        <td>Respuesta</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 0;
                    @endphp
                    @foreach ($preguntas as $pregunta)
                        <tr>
                            <td>{{ $index = $index + 1 }}</td>
                            <td>{{ $pregunta->año }}</td>
                            <td>{{ $pregunta->asignatura }}</td>
                            <td>{{ $pregunta->tema }}</td>
                            <td>{{ $pregunta->pregunta }}</td>
                            <td>
                                @if ($pregunta->respuesta->correcta == 'opcion_1')
                                    {{ $pregunta->respuesta->opcion_1 }}
                                @elseif($pregunta->respuesta->correcta == 'opcion_2')
                                    {{ $pregunta->respuesta->opcion_2 }}
                                @elseif($pregunta->respuesta->correcta == 'opcion_3')
                                    {{ $pregunta->respuesta->opcion_3 }}
                                @elseif($pregunta->respuesta->correcta == 'opcion_4')
                                    {{ $pregunta->respuesta->opcion_4 }}
                                @elseif($pregunta->respuesta->correcta == 'opcion_5')
                                    {{ $pregunta->respuesta->opcion_5 }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit_question', ['id' => $pregunta->id]) }}">Editar</a><br>
                                <a href="{{ route('change_question', ['action' => 'eliminar']) }}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
