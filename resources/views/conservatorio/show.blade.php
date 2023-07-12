<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pianistas</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-symbols-outlined{
    font-size: 48px;
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
            <ul class="grid grid-cols-2 items-baseline">
                <form id='datosAlumno' class="contents">
                    <label class="caracteristicas ">Nombre</label>
                    <input class="values" type="text" readonly value="{{ $alumno->Nombre }}">

                    <label class="caracteristicas">Apellido</label>
                    <input class="values" type="text" readonly value="{{ $alumno->Apellido }}">
                    
                    <label class="caracteristicas" for="id">Curso</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" max="6" minlength="1" maxlength="1" name="id" type="number" readonly value="{{ $alumno->id }}">

                    <label class="caracteristicas">Cédula</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" id="numbers" minlength="1" maxlength="8" type="number" readonly value="{{ $alumno->Cedula }}">

                    <label class="caracteristicas">Edad</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" min="6" minlength="1" maxlength="2" type="number" readonly value="{{ $alumno->Edad }}">
                
                    <label class="caracteristicas">Fecha de nacimiento</label>
                    <input class="values w-44" type="date" readonly value="{{ $alumno->FechaNacimiento }}">
                
                    <label class="caracteristicas" >Teléfono</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="8" type="tel" readonly value="{{ $alumno->Telefono }}">

                    <label class="caracteristicas">Domicilio</label>
                    <input class="values" type="text" readonly value="{{ $alumno->Domicilio }}">

                    <label class="caracteristicas">Nombre del padre</label>
                    <input class="values" type="text" readonly value="{{ $alumno->NombrePadre }}">

                    <label class="caracteristicas">Nombre de la madre</label>
                    <input class="values" type="text" readonly value="{{ $alumno->NombreMadre }}">
                
                    <label class="caracteristicas">Nombre del tutor</label>
                    <input class="values" type="text" readonly value="{{ $alumno->NombreTutor }}">

                    <label class="caracteristicas">Fecha de Ingreso</label>
                    <input class="values" maxlength="2" type="date" readonly value="{{ $alumno->FechaIngreso }}">
            
                    <label class="caracteristicas">Celular</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="9" type="number" readonly value="{{ $alumno->Celular }}">
                    
                </form> 
            </div>
                <!-- Escolaridad -->                 
                <div id="showLecto" class=" mt-2.5 relative right-2">
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
                                <td id="date" class="w-1/12 bg-slate-50">
                                    <input class="w-full" type="date" name="FechaEscolaridad" id="inputs" readonly value="{{ $escolaridad->FechaEscolaridad }}">
                                </td>
                                <td id="curso" class="bg-slate-50">
                                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="CursoEscolaridad" id="inputs" value="{{ $escolaridad->CursoEscolaridad }}">
                                </td>
                                <td id="instrumento" class="w-2 bg-slate-50">
                                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="InstrumentoEscolaridad" id="inputs" value="{{ $escolaridad->CalificacionEscolaridad }}">
                                </td>
                                <td id="calificacion" class="w-2 bg-slate-50">
                                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="CalificacionEscolaridad" id="inputs" value="{{ $escolaridad->Faltas }}">
                                </td>
                                <td id="observacion" class="w-64 bg-slate-50">
                                    <input class="w-full" type="text" name="ObsevacionEscolaridad" id="inputs" value="{{ $escolaridad->Observacion }}">
                                </td>
                            </tr>
                            @endforeach
        
                        </table>
                    </div>

                      <!-- Instrumento -->                 
                      <div id="showInstrumento" class="hidden mt-2.5 relative right-2">
                          <table class="border-2">
                              <tr>
                                  <th>Fecha</th>
                                  <th>Curso</th>
                                  <th>Calificación</th>
                                  <th>Faltas</th>
                                  <th>Observación</th>
                                </tr>
                                
                            @foreach ($alumno->instrumentos as $instrumento)
                            <tr id="tr">
                                <td id="date" class="w-1/12 bg-slate-50">
                                    <input class="w-full" type="date" name="FechaEscolaridad" readonly value="{{ $instrumento->FechaInstrumento }}">
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
                    </div>
            </ul>
            
            <div class=" top-1 flex flex-wrap items-center">
                <img class="relative left-14 w-[7rem]" id="imagen" src="{{ asset('/storage').'/'.$alumno->Foto }}">
            </div>

        </section>
        
        <footer class=" mt-8 ">
            <div class="relative  flex justify-evenly items-center "> 
                <div class="relative" id="container">
                    <div class=" bg-white w-[4.5rem] rounded-3xl h-10 flex items-center " id="toggle">
                        <div class="toggle absolute bg-blue-700 left-1 top-1 w-8 h-8 rounded-3xl transition-all duration-300 delay-150" id="toggle-button"></div>
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
    let lecto= document.querySelector('#showLecto');
    let instr= document.querySelector('#showInstrumento');

    btn.addEventListener('click', ()=>{
        if(!toggleBtn.classList.contains('active')){
            toggleBtn.classList.toggle('active');
            text.innerHTML='Instrumento';
            lecto.classList.toggle('hidden');
            instr.classList.toggle('hidden');
        }else{
            toggleBtn.classList.toggle('active');
            text.innerHTML='Lectoescritura';
            lecto.classList.toggle('hidden');
            instr.classList.toggle('hidden');
        }
    });

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

    nullInputs.forEach((nullInput) => {
    nullInput.style.display = 'none';
    });
    </script>
</html>