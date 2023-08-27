<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>base de datos</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <style type="text/tailwindcss">
        #items{
            @apply text-xl border border-slate-600;
        }
    </style> -->

<body class="bg-gradient-to-r from-blue-600 to-blue-700">
    <header class="bg-gradient-to-r from-blue-600 to-blue-700 h-32">
        <div class="logo grid grid-cols-3 items-center">
            <img class="h-28 w-36 ml-4" src="{{ asset('img/logo_1.png') }}" alt="imagen_logo_conservatorio">
            <p class="relative right-72 text-xl leading-9 uppercase text-blue-50 top-2 font-medium font-roboto">
                Conservatorio Departamental <br>
                de Música - Mtro. Bautista Peruchena <br>
                Salto-R.O.U
            </p>
            
            <!-- Buscador -->
            <div class="">
                <input class="w-[28rem]  p-3 rounded" id="search"  placeholder="Buscar por nombre, apellido o cédula..."  type="text">
                    <ul class='absolute bg-slate-200  w-[28rem] p-3 ' id="sugerencias">
                        <li class="border border-slate-400 ">hola</li>
                        <li >ca</li>
                    </ul>
                </input>
            </div> 
        </div>
    </header>
    
    <!-- Seleccionar alumnos por instrumentos -->
    <section class="container flex"> 
        <div class="flex flex-col items-start">
            <div id="instrumentos" class="relative left-6 top-1 grid grid-rows-4 grid-flow-col gap-8 text-center rounded-m ">
                <a href="{{ asset('alumnos/vistaGeneral') }}">
                    <button class="text-6xl font-bold hover:bg-blue-500 bg-opacity-40 w-32  hover:scale-125 h-24 rounded-md" alt='imagenPiano' piano>🎹</button>
                </a>

                <button class="text-6xl font-bold hover:bg-blue-500 hover:scale-125 bg-opacity-40 h-24 rounded-md" alt='imagenGuitarra'>🎸</button>

                <button class=" hover:bg-blue-500 hover:scale-125 bg-opacity-40 w-32 flex justify-center items-center h-24 rounded-md">
                    <img class="w-20 h-20" src="{{ asset('/img/drum.png') }}" alt="percusión">
                </button>

                <button class="text-6xl hover:bg-blue-500 bg-opacity-40 w-full hover:scale-125 h-24 rounded-md" alt='imagenViolín'>🎻</button>

                <button class="text-6xl hover:bg-blue-500 bg-opacity-4n0 w-full  hover:scale-125 h-24 rounded-md" alt='imagenSaxo'>🎷</button>
                
                <button class="text-6xl hover:bg-blue-500 bg-opacity-40 w-full  hover:scale-125 h-24 rounded-md" alt='imagenTrompeta'>🎺</button>

                <button class=" hover:bg-blue-500 hover:scale-125 bg-opacity-40 w-32 flex justify-center items-center h-24 rounded-md">
                    <img class="w-20 h-20" src="{{ asset('/img/clarinet.svg') }}" alt="clarinete">
                </button>

                <button class=" hover:bg-blue-500 hover:scale-125 bg-opacity-40 w-32 flex justify-center items-center h-24 rounded-md">
                    <img class="w-20 h-20" src="{{ asset('/img/trombone.png') }}" alt="trombón">
                </button>

                <button class="-ml-8 hover:bg-blue-500 bg-opacity-40 w-32 flex justify-center items-center  hover:scale-125 h-24 rounded-md">
                    <img class="w-20' h-20" src="{{ asset('/img/tuba.png') }}" alt="tuba">
                </button>

            </div>
        </div>
    </section>
</body>
<script>
let search = document.querySelector('#search');
// let sugerencias= document.querySelector('#sugerencias');
var alumnos = <?php echo json_encode($alumno)?>;

    search.addEventListener('input', () => {
        const searched = search.value.toLowerCase();

        for (let i = 0; i < alumnos.length; i++) {
            let alumno = alumnos[i].Nombre.toLowerCase().charAt();

            if (alumno.includes(searched)) {
                console.log(alumnos[i].Nombre);
            }
        }
    });
</script>
</html>