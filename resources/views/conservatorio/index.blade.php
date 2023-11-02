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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        .sugerencias_item{
           @apply relative flex justify-items-center justify-between text-center items-center bg-slate-200 w-[28rem] p-3;
        }
        #sugerencias li{
            @apply cursor-default rounded border border-blue-800;
        }
        #sugerencias li:hover{
            @apply bg-cyan-700 text-white;
        }
        #sugerencias li:hover .view .edit{
            @apply bg-cyan-700 text-white;
        }
        .material-symbols-outlined{
            font-size: 2rem;
        }
        .view{
            @apply cursor-pointer relative right-6;
        }
        .edit{
            @apply cursor-pointer;
        }
       
    </style>

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
            <div class="flex flex-col justify-center">
                <input class="outline-none absolute w-[28rem] p-3 rounded" type="text" id="search" placeholder="Buscar por nombre o apellido..."  type="text"></input>
                <ul class='absolute w-[28rem] flex flex-col top-20 text-lg font-semibold' id="sugerencias"></ul>
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
let sugerencias= document.querySelector('#sugerencias');
var alumnos = <?php echo json_encode($alumno)?>;

search.addEventListener('input', () => {
    const searched = search.value.toLowerCase();
    sugerencias.innerHTML = '';

    if (searched === '') {
        return;
    }

    for (let i = 0; i < alumnos.length; i++) {
    const nombreCompleto = alumnos[i].Nombre.toLowerCase() + ' ' + alumnos[i].Apellido.toLowerCase();
    const apellido = alumnos[i].Apellido.toLowerCase();

    if (nombreCompleto.startsWith(searched)) {
        let item = document.createElement('li');
        item.classList.add('sugerencias_item');
        item.textContent = nombreCompleto;

        const linksDiv = document.createElement('div');

        const viewLink = document.createElement('a');
        viewLink.classList.add('view');
        viewLink.href = `conservatorio/${alumnos[i].id}`; 
        viewLink.innerHTML = '<span class="material-symbols-outlined">visibility</span>';

        // Crear el enlace "edit"
        const editLink = document.createElement('a');
        editLink.classList.add('edit');
        editLink.href = `conservatorio/edit/${alumnos[i].id}`;
        editLink.innerHTML = '<span class="material-symbols-outlined">edit</span>';

        linksDiv.appendChild(viewLink);
        linksDiv.appendChild(editLink);

        item.appendChild(linksDiv);

        sugerencias.appendChild(item);
    }

    if (apellido.startsWith(searched)) {
        let item = document.createElement('li');
        item.classList.add('sugerencias_item');
        item.textContent = nombreCompleto;

        // Crear el div para envolver los enlaces
        const linksDiv = document.createElement('div');

        // Crear el enlace "view"
        const viewLink = document.createElement('a');
        viewLink.classList.add('view');
        viewLink.href = `conservatorio/${alumnos[i].id}`; // Reemplaza con la URL adecuada
        viewLink.innerHTML = '<span class="material-symbols-outlined">visibility</span>';

        // Crear el enlace "edit"
        const editLink = document.createElement('a');
        editLink.classList.add('edit');
        editLink.href = `conservatorio/edit/${alumnos[i].id}`; // Reemplaza con la URL adecuada
        editLink.innerHTML = '<span class="material-symbols-outlined">edit</span>';

        // Agregar los enlaces al div
        linksDiv.appendChild(viewLink);
        linksDiv.appendChild(editLink);

        // Agregar el div de enlaces al elemento li
        item.appendChild(linksDiv);

        sugerencias.appendChild(item);
    }
}

});

</script>
</html>