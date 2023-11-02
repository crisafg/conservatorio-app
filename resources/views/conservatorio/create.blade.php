<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toasty msg al enviar formularios -->
@if (session('datosEnviados'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var datosEnviados = <?php echo json_encode(session('datosEnviados')) ?>;
            Swal.fire({
                title: datosEnviados,
                icon: 'success'
            });
        });
    </script>
@endif

</head>
<body class="bg-gradient-to-r from-blue-600 to-blue-700 text-gray-100">
    <main class="max-xl:w-[1200px] 2xl:[2132px]">
        
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
    
    <section class="flex ml-20 justify-normal xl:justify-evenly 2xl:mt-16">
        <div>
      
            <form id="form_1" action="{{ url('/conservatorio') }}" method="post" enctype="multipart/form-data" class="contents">
                <ul class="grid grid-cols-2 items-baseline">
                            @csrf        
                    <input class="hidden" type="file" name="Foto" id="imagen">
                    <label for="imagen" id='imgUploaded' class="absolute left-[88rem] bottom-[22rem] w-14 cursor-pointer">
                        @if(session('rutaImagen'))
                            <img  class="relative left-14 w-[7rem]" id='img' src="{{ asset('storage/' . session('rutaImagen')) }}" alt="Imagen del alumno">
                        @else
                            <img id='img' src="{{ asset('/img/add_photo.png') }}" alt="Agregar foto">
                        @endif
                    </label>



                    <label class="caracteristicas" for="Nombre">Nombre</label>
                    <input class="values" type="text" name="Nombre"  value="{{ old('Nombre', session('datosAlumno.Nombre')) }}">

                    <label class="caracteristicas" for="Apellido">Apellido</label>
                    <input class="values" type="text" name="Apellido" value="{{ old('Apellido', session('datosAlumno.Apellido')) }}">
                    
                    <label class="caracteristicas" for="Curso">Curso</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" max="6" minlength="1" maxlength="1" name="Curso" type="number" value="{{ old('Curso', session('datosAlumno.Curso')) }}">
                    
                    <label class="caracteristicas" for="Cedula">Cédula</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" id="numbers" minlength="1" maxlength="8" name="Cedula" type="number" value="{{ old('Cedula', session('datosAlumno.Cedula')) }}">

                    <label class="caracteristicas" for="Edad">Edad</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" min="6" minlength="1" maxlength="2" name="Edad" type="number" value="{{ old('Edad', session('datosAlumno.Edad')) }}">
                
                    <label class="caracteristicas" for="FechaNacimiento">Fecha de nacimiento</label>
                    <input class="values" class="values w-44" name="FechaNacimiento" max="4" type="date" value="{{ old('FechaNacimiento', session('datosAlumno.FechaNacimiento')) }}">
                
                    <label class="caracteristicas" for="Telefono">Teléfono</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="8" name="Telefono" type="tel" value="{{ old('Telefono', session('datosAlumno.Telefono')) }}">

                    <label class="caracteristicas" for="Domicilio">Domicilio</label>
                    <input class="values" type="text" name="Domicilio"value="{{ old('Domicilio', session('datosAlumno.Domicilio')) }}">

                    <label class="caracteristicas" for="NombrePadre">Nombre del padre</label>
                    <input class="values" type="text" name="NombrePadre" value="{{ old('NombrePadre', session('datosAlumno.NombrePadre')) }}">

                    <label class="caracteristicas" for="NombreMadre">Nombre de la madre</label>
                    <input class="values" type="text" name="NombreMadre" value="{{ old('NombreMadre', session('datosAlumno.NombreMadre')) }}">
                
                    <label class="caracteristicas" for="NombreTutor">Nombre del tutor</label>
                    <input class="values" type="text" name="NombreTutor" value="{{ old('NombreTutor', session('datosAlumno.NombreTutor')) }}">

                    <label class="caracteristicas" for="FechaIngreso">Fecha de Ingreso</label>
                    <input class="values" maxlength="2" type="date" name="FechaIngreso" value="{{ old('FechaIngreso', session('datosAlumno.FechaIngreso')) }}">
            
                    <label class="caracteristicas" for="Celular">Celular</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="9" type="number" name="Celular" value="{{ old('Celular', session('datosAlumno.Celular')) }}">
                </form>
            </div>
        <!-- Escolaridad -->                 
        <div id="lecto" class="mt-2.5 relative ml-4">
            <form  id="form_2" action="{{ url('/carnet') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <table id="table-parent" class="border-2"> 
                    <thead>
                        <th>Fecha</th>
                        <th>Curso</th>
                        <th>Calificación</th>
                        <th>Faltas</th>
                        <th>Observación</th>
                    </thead>

                    <tr>
                        <input name="id" class="hidden">
                        <td id="date" class="w-1/12 bg-slate-50">
                            <input class="w-full" type="date" name="FechaEscolaridad[0]"  value="{{ session('fechaEscolaridad') }}">
                        </td>
                        <td id="curso" class="bg-slate-50">
                            <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="CursoEscolaridad[]" value="{{ session('CursoEscolaridad') }}">
                        </td>
                        <td id="calificacion" class="w-2 bg-slate-50">
                            <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="CalificacionEscolaridad[]" value="{{ old('CalificacionEscolaridad') }}">
                        </td>
                        <td id="faltas" class="w-2 bg-slate-50">
                            <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="Faltas[]" value="{{ old('Faltas') }}">
                        </td>
                        <td id="observacion" class="w-64 bg-slate-50">
                            <input class="w-full" type="text" name="Observacion[]" value="{{ old('Observacion') }}">
                        </td>
                    </tr>

                    </table>
                </form>      
            </div>
            
            
            <!-- Instrumento -->
            <div id="instr" class="hidden mt-2.5 relative ml-4">
            <form  id="form_3" action="{{ url('/instrumento') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <table id="table-parent" class="border-2"> 
                    <thead>
                        <th>Fecha</th>
                        <th>Curso</th>
                        <th>Calificación</th>
                        <th>Faltas</th>
                        <th>Observación</th>
                    </thead>

                    <tr>
                        <td id="date" class="w-1/12 bg-slate-50">
                            <input class="w-full" type="date" name="FechaInstrumento[]" value="">
                        </td>
                        <td id="curso" class="bg-slate-50">
                            <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="CursoInstrumento[]" value="">
                        </td>
                        <td id="calificacion" class="w-2 bg-slate-50">
                            <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="CalificacionInstrumento[]" value="">
                        </td>
                        <td id="instrumento" class="w-2 bg-slate-50">
                            <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="FaltasInstrumento[]" value="">
                        </td>
                        <td id="observacion" class="w-64 bg-slate-50">
                            <input class="w-full" type="text" name="ObservacionInstrumento[]" value="">
                        </td>

                    </tr>
                    </table>
                </form>      
            </div>

            <div>
                <button id="coll-btn">
                    <span class="material-symbols-outlined">
                    expand_more
                    </span>
                </button>
            </div>
        </section>
        
        <footer class="mt-2 xl:mt-12 flex justify-around items-center relative right-32">
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
    </main>

</body>

@if($errors->count() > 0)
        <div id="error_div" class="hidden">
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif
    @if ($errors->count()>0)
    <script>
        var errorContent = document.querySelector("#error_div").innerHTML;
        var has_errors= <?php ?> {{ $errors->count() > 0 ? 'true' : 'false'}}
            if (has_errors){
                    // let errorMessage = 'Los siguientes campos tienen errores:<br>' + errorMessages.join('<br>');
                    Swal.fire({ 
                        title: 'Atención',
                        icon: 'warning',
                        html: errorContent,
                    });
            }
    </script>
    @endif

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
    let newImg= document.querySelector('#imgUploaded');
    input.onchange= ()=>{
        img.src= URL.createObjectURL(input.files[0]);
        // ajustes de dimensiones de imagen subida.
        newImg.style.width='7rem';
        newImg.style.left='84rem';
        newImg.style.bottom='19rem';
    };

    // collapse button

    let collBtn= document.querySelector('#coll-btn');
    let inputs = [...document.querySelectorAll('#inputs')];
    let nullInputs = []; 
    
    let table= document.querySelectorAll('#table-parent');
    collBtn.addEventListener('click', ()=>{
        for (let i = 0; i < table.length; i++) {
        let nrow= document.createElement('tr');
        const row= nrow.innerHTML= `
                <tr>
                    <input name="id" class="hidden">    
                    <td id="date" class="w-1/12 bg-slate-50">
                        <input class="w-full" type="date" name="FechaEscolaridad[]" value="">
                    </td>
                    <td id="curso" class="bg-slate-50">
                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="CursoEscolaridad[]" value="">
                    </td>
                    <td id="calificacion" class="w-2 bg-slate-50">
                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="CalificacionEscolaridad[]" value="">
                    </td>
                    <td id="faltas" class="w-2 bg-slate-50">
                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="Faltas[]" value="">
                    </td>
                    <td id="observacion" class="w-64 bg-slate-50">
                        <input class="w-full" type="text" name="Observacion[]" value="">
                    </td>
                </tr>
            `
                table[i].appendChild(nrow);
            }
    });

    // 

   
</script>
</html>