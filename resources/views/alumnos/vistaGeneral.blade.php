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

    .keys {
      display: block;
      width: 14rem;
      /* margin-top: 2rem; */
      height: 4rem;
      position: relative;
    }

    .key {
      position: relative;
      border: 3px solid black;
      border-radius: .5rem;
      transition: all .07s ease;
      display: block;
      box-sizing: border-box;
      z-index: 2;
    }
    
    .key:not(.sharp) {
      float: left;
      width: 10%;
      height: 100%;
      background: rgba(255, 255, 255, .8);    
    }

    .key.sharp {
      position: absolute;
      width: 6%;
      height: 60%;
      background: #000;
      color: #eee;
      top: 0;
      z-index: 3;
    }
    .key[data-key="87"] {
      left: 7%;
    }

    .key[data-key="69"] {
      left: 17%;
    }

    .key[data-key="84"]  {
      left: 37%;
    }

    .key[data-key="89"] {
      left: 47%;
    }

    .key[data-key="85"] {
      left: 57%;    
    }

    .key[data-key="79"] {
      left: 77%;    
    }

    .key[data-key="80"] {
      left: 87%;    
    }

    table {
        background-image: linear-gradient(to right, #0284c7, #06b6d4 , #0284c7, #06b6d4 , #0284c7);
        
    }

    th{
        padding: 1.5rem;
        border: none;
   
    }
    td{
        padding: 1rem;
        border: none;
    }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-600 to-blue-700 text-gray-100">
    <header class="flex justify-between items-end mt-6">
        <a class="h-12 text-black cursor-pointer ml-2" href="{{ asset('/conservatorio') }}">
            <span class="material-symbols-outlined">home</span>
        </a>

        <audio id="pianito" src="{{ asset('/samples/piano.wav') }}" controls style="display:none"></audio>
        <a onpointerdown="playAudio()" class="text-black cursor-pointer" href="{{ asset ('conservatorio/create') }}">
            <div class="keys right-60 top-2">
                <div data-key="65" class="key" id="Cmaj" data-note="C">
                </div>
                <div data-key="87" class="key sharp" data-note="C#">
                    <span class="hints"></span>
                </div>
                <div data-key="83" class="key" data-note="D">
                    <span class="hints"></span>
                </div>
                <div data-key="69" class="key sharp" data-note="D#">
                    <span class="hints"></span>
                </div>
                <div data-key="68" class="key" id="Cmaj" data-note="E">
                    <span class="hints"></span>
                </div>
                <div data-key="70" class="key" data-note="F">
                    <span class="hints"></span>
                </div>
                <div data-key="84" class="key sharp" data-note="F#">
                    <span class="hints"></span>
                </div>
                <div data-key="71" class="key" id="Cmaj" data-note="G">
                    <span class="hints"></span>
                </div>
                <h1 class="whitespace-pre relative top-4 left-2 font-semibold text-xl uppercase">Agregar nuevo alumno</h1>
            </div>
        </a>
    </header>
    
    <main class="flex justify-center mt-10 whitespace-nowrap"> 
        <table class="border rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th scope="col">Apellido</th>
                    <th data-sortable="" scope="col">Curso</th>
                    <th>Datos del alumno</th>
                    <th>Editar</th>
                    <th>Borrar alumno</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($alumnos as $alumno)
                <tr>
                    <td class="text-lg">{{ $alumno->Nombre }}</td>
                    <td class="text-lg">{{ $alumno->Apellido }}</td>
                    <td id="curso" class="text-center text-lg">{{ $alumno->Curso }}</td>
                    <td>
                        <a href="{{ route ('conservatorio.show', $alumno->id) }}" class="cursor-pointer flex justify-center ">
                            <span class="material-symbols-outlined hover:text-blue-900 hover:font-semibold hover:scale-105">
                                visibility
                            </span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('conservatorio.edit', $alumno->id) }}">
                            <span class="material-symbols-outlined hover:text-blue-900 hover:font-semibold hover:scale-105">
                                edit
                            </span>
                        </a>
                    </td>
                    <td>
                        <form action="{{ $alumno->id  }}" class="flex justify-center" method="post">
                            @csrf
                            {{ @method_field('delete') }}
                            <button type="submit" onclick="return confirm('Estás seguro de borrar?')">
                                <span class="material-symbols-outlined hover:text-blue-900 hover:font-semibold hover:scale-105">
                                    delete
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
        @endforeach
    </table>

</main>

<nav>
    <ul>
        <li>
            <a href="">
                <span class="material-symbols-outlined">
                square
                </span>
            </a>
        </li>
    </ul>
</nav>

</body>
<script>
    let piano= document.querySelector('.keys');
    let chord = document.querySelectorAll('#Cmaj');

    piano.addEventListener('mouseenter', ()=>{
        chord.forEach(notas=>{
            notas.style.opacity='70%';
        })
    });
    piano.addEventListener('mouseleave', ()=>{
        chord.forEach(notas=>{
            notas.style.opacity='initial';
        })
    });
    piano.addEventListener('click', ()=>{
        chord.forEach(notas=>{
            notas.style.backgroundColor= 'rgb(37 99 235 / 0)'
        })
    });


    let pianito= document.querySelector('#pianito');
    // let isAudioPlaying= true;
    function playAudio () {
        pianito.play();
}
</script>
</html>