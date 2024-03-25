@extends('template')

@section('content')
    <form method="POST" action="{{ route('store_question', ['value' => 'untels']) }}" enctype="multipart/form-data">
        @csrf
        <br>
        <h2 class="form-title"> Editar Pregunta </h2><br>

        <div class="form_question_container">
            @if( $pregunta->tema != "Texto" )
            <label class="filter-label" for="año">Año:</label><br>
            <select class="filter-select" id="año" name="año">
                <option value="" disabled>Seleccionar</option>
                <option value="2019" {{ $pregunta->año == '2019' ? 'selected' : '' }}>2019</option>
                <option value="2020" {{ $pregunta->año == '2020' ? 'selected' : '' }}>2020</option>
                <option value="2021" {{ $pregunta->año == '2021' ? 'selected' : '' }}>2021</option>
                <option value="2022" {{ $pregunta->año == '2022' ? 'selected' : '' }}>2022</option>
                <option value="2023" {{ $pregunta->año == '2023' ? 'selected' : '' }}>2023</option>
            </select><br>

            <label class="filter-label" for="asignatura">Asignatura:</label><br>
            <select class="filter-select" id="asignatura" name="asignatura">
                <option value="" disabled>Seleccionar</option>
                <option value="RV" {{ $pregunta->asignatura == 'RV' ? 'selected' : '' }}>Razonamiento Verbal</option>
                <option value="RM" {{ $pregunta->asignatura == 'RM' ? 'selected' : '' }}>Razonamiento Matematico</option>
                <option value="Aritmetica" {{ $pregunta->asignatura == 'Aritmetica' ? 'selected' : '' }}>Aritmetica</option>
                <option value="Algebra" {{ $pregunta->asignatura == 'Algebra' ? 'selected' : '' }}>Algebra</option>
                <option value="Geometria" {{ $pregunta->asignatura == 'Geometria' ? 'selected' : '' }}>Geometria</option>
                <option value="Trigonometria" {{ $pregunta->asignatura == 'Trigonometria' ? 'selected' : '' }}>Trigonometria</option>
                <option value="Fisica" {{ $pregunta->asignatura == 'Fisica' ? 'selected' : '' }}>Fisica</option>
                <option value="Quimica" {{ $pregunta->asignatura == 'Quimica' ? 'selected' : '' }}>Quimica</option>
                <option value="Biologia" {{ $pregunta->asignatura == 'Biologia' ? 'selected' : '' }}>Biologia</option>
                <option value="Lenguaje" {{ $pregunta->asignatura == 'Lenguaje' ? 'selected' : '' }}>Lenguaje</option>
                <option value="Literatura" {{ $pregunta->asignatura == 'Literatura' ? 'selected' : '' }}>Literatura</option>
                <option value="HP" {{ $pregunta->asignatura == 'HP' ? 'selected' : '' }}>Historia del Peru</option>
                <option value="HU" {{ $pregunta->asignatura == 'HU' ? 'selected' : '' }}>Historia Universal</option>
                <option value="Filosofia" {{ $pregunta->asignatura == 'Filosofia' ? 'selected' : '' }}>Filosofia</option>
                <option value="Logica" {{ $pregunta->asignatura == 'Logica' ? 'selected' : '' }}>Logica</option>
                <option value="Economia" {{ $pregunta->asignatura == 'Economia' ? 'selected' : '' }}>Economia</option>
            </select><br>

            <p>Si deseas cambiar el tema, selecciona la misma asignatura nuevamente. Si no, déjalo como está.</p>
            <label class="filter-label" for="tema">Tema:</label><br>
            <select class="filter-select" id="tema" name="tema">
                <option value="" selected disabled>Seleccionar</option>
            </select><br>

            <div class="pregunta_container">
                <label for="pregunta">Pregunta:</label><br>
                <textarea id="pregunta" name="pregunta">{{ $pregunta->pregunta }}</textarea><br>

                <label for="imagen">Imagen (De ser necesario):</label><br>
                <input type="file" id="imagen" name="imagen" accept="image/*"><br>
                <img id="imagenPrevisualizacion" src="#" alt="Previsualización de imagen"
                    style="max-width: 200px; max-height: 200px; display: none;"><br>

                <label for="opcion_1">Opcion 1:</label><br>
                <input type="text" id="opcion_1" name="opcion_1" value="{{$pregunta->respuesta->opcion_1}}" required><br>

                <label for="opcion_2">Opcion 2:</label><br>
                <input type="text" id="opcion_2" name="opcion_2" value="{{$pregunta->respuesta->opcion_2}}" required><br>

                <label for="opcion_3">Opcion 3:</label><br>
                <input type="text" id="opcion_3" name="opcion_3" value="{{$pregunta->respuesta->opcion_3}}" required><br>

                <label for="opcion_4">Opcion 4:</label><br>
                <input type="text" id="opcion_4" name="opcion_4" value="{{$pregunta->respuesta->opcion_4}}" required><br>

                <label for="opcion_5">Opcion 5:</label><br>
                <input type="text" id="opcion_5" name="opcion_5" value="{{$pregunta->respuesta->opcion_5}}" required><br>

                <label class="filter-label" for="correcta">Opción Correcta:</label><br>
                <select class="filter-select" id="correcta" name="correcta">
                    <option value="" disabled>Seleccionar</option>
                    <option value="opcion_1" {{ $pregunta->respuesta->correcta == 'opcion_1' ? 'selected' : '' }}>Opción 1</option>
                    <option value="opcion_2" {{ $pregunta->respuesta->correcta == 'opcion_2' ? 'selected' : '' }}>Opción 2</option>
                    <option value="opcion_3" {{ $pregunta->respuesta->correcta == 'opcion_3' ? 'selected' : '' }}>Opción 3</option>
                    <option value="opcion_4" {{ $pregunta->respuesta->correcta == 'opcion_4' ? 'selected' : '' }}>Opción 4</option>
                    <option value="opcion_5" {{ $pregunta->respuesta->correcta == 'opcion_5' ? 'selected' : '' }}>Opción 5</option>
                </select><br>


                <label for="resolucion">Resolucion (De ser necesario):</label><br>
                <input type="file" id="resolucion" name="resolucion" accept="image/*"><br>
                <img id="resolucionPrevisualizacion" src="#" alt="Resolucion de imagen"
                    style="max-width: 200px; max-height: 200px; display: none;"><br>

            </div>
            @else
            <div class="pregunta_texto_container" style="display: none;">

                <label for="texto">Texto:</label><br>
                <textarea id="texto" name="texto"></textarea><br>

                <label for="pregunta">Pregunta 1:</label><br>
                <textarea type="text" id="pregunta" name="pregunta[]"></textarea><br>

                <label for="opcion_1">Opcion 1:</label><br>
                <input type="text" id="opcion_1" name="opcion_1[]" required><br>

                <label for="opcion_2">Opcion 2:</label><br>
                <input type="text" id="opcion_2" name="opcion_2[]" required><br>

                <label for="opcion_3">Opcion 3:</label><br>
                <input type="text" id="opcion_3" name="opcion_3[]" required><br>

                <label for="opcion_4">Opcion 4:</label><br>
                <input type="text" id="opcion_4" name="opcion_4[]" required><br>

                <label for="opcion_5">Opcion 5:</label><br>
                <input type="text" id="opcion_5" name="opcion_5[]" required><br>

                <label class="filter-label" for="correcta">Opcion Correcta:</label><br>
                <select class="filter-select" id="correcta" name="correcta[]">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Opcion 1">Opcion 1</option>
                    <option value="Opcion 2">Opcion 2</option>
                    <option value="Opcion 3">Opcion 3</option>
                    <option value="Opcion 4">Opcion 4</option>
                    <option value="Opcion 5">Opcion 5</option>
                </select><br>

                <label for="pregunta">Pregunta 2:</label><br>
                <textarea type="text" id="pregunta" name="pregunta[]"></textarea><br>

                <label for="opcion_1">Opcion 1:</label><br>
                <input type="text" id="opcion_1" name="opcion_1[]" required><br>

                <label for="opcion_2">Opcion 2:</label><br>
                <input type="text" id="opcion_2" name="opcion_2[]" required><br>

                <label for="opcion_3">Opcion 3:</label><br>
                <input type="text" id="opcion_3" name="opcion_3[]" required><br>

                <label for="opcion_4">Opcion 4:</label><br>
                <input type="text" id="opcion_4" name="opcion_4[]" required><br>

                <label for="opcion_5">Opcion 5:</label><br>
                <input type="text" id="opcion_5" name="opcion_5[]" required><br>

                <label class="filter-label" for="correcta">Opcion Correcta:</label><br>
                <select class="filter-select" id="correcta" name="correcta[]">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Opcion 1">Opcion 1</option>
                    <option value="Opcion 2">Opcion 2</option>
                    <option value="Opcion 3">Opcion 3</option>
                    <option value="Opcion 4">Opcion 4</option>
                    <option value="Opcion 5">Opcion 5</option>
                </select><br>

                <label for="pregunta">Pregunta 3:</label><br>
                <textarea type="text" id="pregunta" name="pregunta[]"></textarea><br>

                <label for="opcion_1">Opcion 1:</label><br>
                <input type="text" id="opcion_1" name="opcion_1[]" required><br>

                <label for="opcion_2">Opcion 2:</label><br>
                <input type="text" id="opcion_2" name="opcion_2[]" required><br>

                <label for="opcion_3">Opcion 3:</label><br>
                <input type="text" id="opcion_3" name="opcion_3[]" required><br>

                <label for="opcion_4">Opcion 4:</label><br>
                <input type="text" id="opcion_4" name="opcion_4[]" required><br>

                <label for="opcion_5">Opcion 5:</label><br>
                <input type="text" id="opcion_5" name="opcion_5[]" required><br>

                <label class="filter-label" for="correcta">Opcion Correcta:</label><br>
                <select class="filter-select" id="correcta" name="correcta[]">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Opcion 1">Opcion 1</option>
                    <option value="Opcion 2">Opcion 2</option>
                    <option value="Opcion 3">Opcion 3</option>
                    <option value="Opcion 4">Opcion 4</option>
                    <option value="Opcion 5">Opcion 5</option>
                </select><br>

                <label for="pregunta">Pregunta 4:</label><br>
                <textarea type="text" id="pregunta" name="pregunta[]"></textarea><br>

                <label for="opcion_1">Opcion 1:</label><br>
                <input type="text" id="opcion_1" name="opcion_1[]" required><br>

                <label for="opcion_2">Opcion 2:</label><br>
                <input type="text" id="opcion_2" name="opcion_2[]" required><br>

                <label for="opcion_3">Opcion 3:</label><br>
                <input type="text" id="opcion_3" name="opcion_3[]" required><br>

                <label for="opcion_4">Opcion 4:</label><br>
                <input type="text" id="opcion_4" name="opcion_4[]" required><br>

                <label for="opcion_5">Opcion 5:</label><br>
                <input type="text" id="opcion_5" name="opcion_5[]" required><br>

                <label class="filter-label" for="correcta">Opcion Correcta:</label><br>
                <select class="filter-select" id="correcta" name="correcta[]">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Opcion 1">Opcion 1</option>
                    <option value="Opcion 2">Opcion 2</option>
                    <option value="Opcion 3">Opcion 3</option>
                    <option value="Opcion 4">Opcion 4</option>
                    <option value="Opcion 5">Opcion 5</option>
                </select><br>

                <label for="pregunta">Pregunta 5:</label><br>
                <textarea type="text" id="pregunta" name="pregunta[]"></textarea><br>

                <label for="opcion_1">Opcion 1:</label><br>
                <input type="text" id="opcion_1" name="opcion_1[]" required><br>

                <label for="opcion_2">Opcion 2:</label><br>
                <input type="text" id="opcion_2" name="opcion_2[]" required><br>

                <label for="opcion_3">Opcion 3:</label><br>
                <input type="text" id="opcion_3" name="opcion_3[]" required><br>

                <label for="opcion_4">Opcion 4:</label><br>
                <input type="text" id="opcion_4" name="opcion_4[]" required><br>

                <label for="opcion_5">Opcion 5:</label><br>
                <input type="text" id="opcion_5" name="opcion_5[]" required><br>

                <label class="filter-label" for="correcta">Opcion Correcta:</label><br>
                <select class="filter-select" id="correcta" name="correcta[]">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Opcion 1">Opcion 1</option>
                    <option value="Opcion 2">Opcion 2</option>
                    <option value="Opcion 3">Opcion 3</option>
                    <option value="Opcion 4">Opcion 4</option>
                    <option value="Opcion 5">Opcion 5</option>
                </select><br>
            </div>
            <div class="recovery-before-button-container">
                <button type="submit">Guardar</button>
            </div>
        </div>
        @endif
    </form>
    <script>
        var asignaturaTemaMap = {
            RV: ["Sinonimia", "Estructura Textual", "Analogias", "Relaciones al interior del Texto", "Antonimia",
                "Analisis de Texto", "Coherencia Textual", "Compresion Lectora", "Plan de Redaccion",
                "Oraciones Eliminadas"
            ],
            RM: ["Deductivo Simple", "Deductivo Complejo", "Sistema Decimal", "Verdades y Mentiras", "Divisibilidad",
                "MCD y MCM", "Matematica Recreativa"
            ]
        };

        var asignaturaSelect = document.getElementById("asignatura");
        var temaSelect = document.getElementById("tema");
        var preguntaContainer = document.querySelector(".pregunta_container");
        var preguntaTextoContainer = document.querySelector(".pregunta_texto_container");
        var imagenInput = document.getElementById("imagen");
        var resolucionInput = document.getElementById("resolucion");

        asignaturaSelect.addEventListener("change", function() {
            var asignatura = asignaturaSelect.value;
            var temas = asignaturaTemaMap[asignatura] || [];

            // Limpiar el select de temas
            temaSelect.innerHTML = '<option value="" selected disabled>Seleccionar</option>';

            // Agregar opciones al select de temas
            temas.forEach(function(tema) {
                var option = document.createElement("option");
                option.value = tema;
                option.text = tema;
                temaSelect.appendChild(option);
            });
        });

        temaSelect.addEventListener("change", function() {
            var tema = temaSelect.value;
            if (tema === "Texto") {
                preguntaContainer.style.display = "none";
                preguntaTextoContainer.style.display = "block";
                // Remove 'required' attribute from inputs in preguntaContainer
                var inputs = preguntaContainer.querySelectorAll("input:not([type='file']), select");
                inputs.forEach(function(input) {
                    input.removeAttribute("required");
                });
                // Add 'required' attribute to inputs in preguntaTextoContainer except type="file"
                var inputsTexto = preguntaTextoContainer.querySelectorAll("input:not([type='file']), select");
                inputsTexto.forEach(function(input) {
                    input.setAttribute("required", "required");
                });
            } else {
                preguntaContainer.style.display = "block";
                preguntaTextoContainer.style.display = "none";
                // Add 'required' attribute to inputs in preguntaContainer except type="file"
                var inputs = preguntaContainer.querySelectorAll("input:not([type='file']), select");
                inputs.forEach(function(input) {
                    input.setAttribute("required", "required");
                });
                // Remove 'required' attribute from inputs in preguntaTextoContainer
                var inputsTexto = preguntaTextoContainer.querySelectorAll("input:not([type='file']), select");
                inputsTexto.forEach(function(input) {
                    input.removeAttribute("required");
                });
            }
        });

        imagenInput.addEventListener("change", function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("imagenPrevisualizacion").src = e.target.result;
                document.getElementById("imagenPrevisualizacion").style.display = "block";
            }

            reader.readAsDataURL(this.files[0]);
        });

        resolucionInput.addEventListener("change", function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("resolucionPrevisualizacion").src = e.target.result;
                document.getElementById("resolucionPrevisualizacion").style.display = "block";
            }

            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
