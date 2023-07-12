<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pianistas</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/6167d97d7a.js" crossorigin="anonymous"></script>
    <style>
    .material-symbols-outlined{
        font-size: 48px;
    }
    .material-symbols-outlined[id='editPhoto']{
        color: black;
        position: absolute;
        font: bold;
        display: none;
    }
    .active{
        transform:translateX(100%);
    }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-600 to-blue-700 text-gray-100">
    
    <header class="flex flex-wrap h-8">
        <a class="h-12 text-black cursor-pointer" href="{{ asset('/conservatorio') }}">
            <button>
                <span class="material-symbols-outlined">home</span>
            </button>
        </a>

        <a class="h-12 relative left-4 text-black cursor-pointer" href="{{ asset('/alumnos/vistaGeneral') }}">
            <button>
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </button>
        </a>

    </header>
    
    
    <section class="flex ml-20">
    <div>
        <form id='form_1' action="{{ url ('conservatorio/edit/'.$alumno->id) }}" method="post" enctype="multipart/form-data" class="contents">
            <ul class="grid grid-cols-2 items-baseline">
                @csrf 
                {{ method_field('PATCH') }}
                <!-- <input name="_method" type="hidden" value="PUT"> -->
                    <input class="hidden" type="file" name="Foto"  id="imagen">
                    <label for="imagen" id='imgUpload'  class="absolute left-[77.5rem] bottom-[19rem] w-[7rem] cursor-pointer">
                        <div class="flex justify-center items-center">
                            <img id="img" src="{{ asset('/storage').'/'.$alumno->Foto }}">
                        </div>
                    </label>
                    

                    <label class="caracteristicas" for="Nombre">Nombre</label>
                    <input class="values" type="text" name="Nombre" value="{{ $alumno->Nombre }}">

                    <label class="caracteristicas" for="Apellido">Apellido</label>
                    <input class="values" type="text" name="Apellido" value="{{ $alumno->Apellido }}">
                    
                    <label class="caracteristicas" for="id">Curso</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" max="6" minlength="1" maxlength="1" name="id" type="number" value="{{ $alumno->id }}">
                    
                    <label class="caracteristicas" for="Cedula">Cédula</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" id="numbers" minlength="1" maxlength="8" name="Cedula" type="number" value="{{ $alumno->Cedula }}">

                    <label class="caracteristicas" for="Edad">Edad</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" min="6" minlength="1" maxlength="2" name="Edad" type="number" value="{{ $alumno->Edad }}">
                
                    <label class="caracteristicas" for="FechaNacimiento">Fecha de nacimiento</label>
                    <input class="values" class="values w-44" name="FechaNacimiento" max="4" type="date" value="{{ $alumno->FechaNacimiento }}">
                
                    <label class="caracteristicas" for="Telefono">Teléfono</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="8" name="Telefono" type="tel" value="{{ $alumno->Telefono }}">

                    <label class="caracteristicas" for="Domicilio">Domicilio</label>
                    <input class="values" type="text" name="Domicilio" value="{{ $alumno->Domicilio }}">

                    <label class="caracteristicas" for="NombrePadre">Nombre del padre</label>
                    <input class="values" type="text" name="NombrePadre" value="{{ $alumno->NombrePadre }}">

                    <label class="caracteristicas" for="NombreMadre">Nombre de la madre</label>
                    <input class="values" type="text" name="NombreMadre" value="{{ $alumno->NombreMadre }}">
                
                    <label class="caracteristicas" for="NombreTutor">Nombre del tutor</label>
                    <input class="values" type="text" name="NombreTutor" value="{{ $alumno->NombreTutor }}">

                    <label class="caracteristicas" for="FechaIngreso">Fecha de Ingreso</label>
                    <input class="values" maxlength="2" type="date" name="FechaIngreso" value="{{ $alumno->FechaIngreso }}">
            
                    <label class="caracteristicas" for="Celular">Celular</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="9" type="number" name="Celular" value="{{ $alumno->Celular }}"> 
                </form> 
            </div>
                <!-- Lecto(escolaridades) -->                 
                    <div id="showLecto" class=" mt-2.5 relative right-2">
                    <form id='form_2' action="{{ url ('carnet/edit/' .$alumno->escolaridades_id) }}" method="post" enctype="multipart/form-data" class="contents">
                            @csrf
                            {{ method_field('PATCH') }}

                            <table class="border-2">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Curso</th>
                                    <th>Calificación</th>
                                    <th>Faltas</th>
                                    <th>Observación</th>
                                </tr>
                                
                                @foreach ($alumno->escolaridades as $escolaridad)
                                <tr>
                                    <input class="hidden" value="{{ $escolaridad->escolaridades_id }}">
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="FechaEscolaridad" id="inputs" value="{{ $escolaridad->FechaEscolaridad }}">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="CursoEscolaridad" id="inputs" value="{{ $escolaridad->CursoEscolaridad }}">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="CalificacionEscolaridad" id="inputs" value="{{ $escolaridad->CalificacionEscolaridad }}">
                                    </td>
                                    <td id="calificacion" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="CalificacionEscolaridad" id="inputs" value="{{ $escolaridad->Faltas }}">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="Observacion" id="inputs" value="{{ $escolaridad->Observacion }}">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </form>
                       
                    </div>

                      <!-- Instrumento -->                 
                      <div id="showInstrumento" class="hidden mt-2.5 relative right-2">
                        <form  id="form_3" action="{{ url('/instrumento') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <table class="border-2">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Curso</th>
                                    <th>Calificación</th>
                                    <th>Faltas</th>
                                    <th>Observación</th>
                                </tr>
                                
                                @foreach ($alumno->instrumentos as $instrumento)
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="FechaEscolaridad" value="{{ $instrumento->FechaInstrumento }}">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="CursoEscolaridad" id="" value="{{ $instrumento->CursoInstrumento }}">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="InstrumentoEscolaridad" id="" value="{{ $instrumento->CalificacionInstrumento }}">
                                    </td>
                                    <td id="calificacion" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="CalificacionEscolaridad" id="" value="{{ $instrumento->FaltasInstrumento }}">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="ObsevacionEscolaridad" id="" value="{{ $instrumento->ObservacionInstrumento }}">
                                    </td>
                                </tr>
                                @endforeach
            
                            </table>
                        </form>
                    </div>
            </ul>
            

        </section>
        
        <footer class="mt-2 flex justify-around items-center relative right-32">
            <div id='datosAlumnos' class='flex justify-beetwen'>
                <input id="submitDatos" class="hidden" form="form_1" type="submit">
                    <label for="submitDatos" class="hover:scale-110 flex flex-nowrap justify-beetwen items-center w-16 relative bottom-2 right-6 cursor-pointer">
                        <img src="{{ asset('/img/alumno.png') }}" alt="Agregar datos de alumnos">
                        <p class='uppercase whitespace-nowrap relative left-4 font-bold text-lg'>Enviar datos de alumno</p>  
                    </label>
            </div>

            <div id='escolaridad' class="flex justify-around items-center">

                <div id="enviarLecto" class="">
                    <input id="submitEscolaridad" class="hidden" form="form_2" type="submit">
                    <label for="submitEscolaridad" class="hover:scale-110 flex flex-nowrap justify-beetwen items-center w-16 relative bottom-2 right-20 cursor-pointer">
                        <img src="{{ asset('/img/calificacion.png') }}" alt="Agregar escolaridad">
                        <p class='uppercase whitespace-nowrap relative left-4 font-bold text-lg'>Enviar calificaciones</p>  
                    </label>
                </div>
                
                <div id="enviarInstr" class="hidden">
                    <input id="submitInstrumento" class="hidden" form="form_3" type="submit">
                    <label for="submitInstrumento" class="hover:scale-110 flex flex-nowrap justify-beetwen items-center w-16 relative bottom-2 right-20 cursor-pointer">
                        <img src="{{ asset('/img/calificacion.png') }}" alt="Agregar escolaridad">
                        <p class='uppercase whitespace-nowrap relative left-4 font-bold text-lg'>Enviar calificaciones</p>  
                    </label>
                </div>
                
                <div class="relative left-48">
                    <div class="bg-white w-[4.5rem] rounded-3xl h-10 flex items-center" id="toggle">
                        <div class="toggle absolute bg-blue-700 left-1 top-1 w-8 h-8 rounded-3xl transition-all duration-300 delay-150" id="toggle-button">
                        </div>
                        <p class="absolute left-24 font-medium text-lg uppercase transition-all duration-300 delay-[600ms]" id="text">Lectoescritura</p>
                    </div>
                </div>
            </div>
        </footer>
</body>
<script>
        // Switch button
        const btn= document.querySelector('#toggle');
    const toggleBtn= document.querySelector('#toggle-button');
    let text= document.querySelector('#text');
    let lecto= document.querySelector('#lecto');
    let instr= document.querySelector('#instr');
    let lectoSbmt= document.querySelector('#enviarLecto');
    let instrSbmt= document.querySelector('#enviarInstr');

    btn.addEventListener('click', ()=>{
        if(!toggleBtn.classList.contains('active')){
            toggleBtn.classList.toggle('active');
            text.innerHTML='Instrumento';

            lecto.classList.toggle('hidden');
            instr.classList.toggle('hidden');

            lectoSbmt.classList.toggle('hidden');
            instrSbmt.classList.toggle('hidden');
        }else{
            toggleBtn.classList.toggle('active');
            text.innerHTML='Lectoescritura';
            
            lecto.classList.toggle('hidden');
            instr.classList.toggle('hidden')

            lectoSbmt.classList.toggle('hidden');
            instrSbmt.classList.toggle('hidden');
        }
    }); 

    // Imagen seleccionada en input
    let img= document.querySelector('#img');
    let input= document.querySelector('#imagen');
    let upload= document.querySelector('#imgUpload');   
    let editIcon= document.querySelector('#editPhoto');

    input.onchange= ()=>{
        img.src= URL.createObjectURL(input.files[0]);
    };

    // No mostrar filas con datos vacios.
    let inputs = [...document.querySelectorAll('#inputs')];
    let nullInputs = []; 

    inputs.forEach((input) => {
        let valueInput = input.value;
        if (valueInput === '') {
            nullInputs.push(input);
            let tr = input.closest('tr');
            if (tr) {
                tr.style.display = 'none';
            }
    }
    });
</script>
</html>