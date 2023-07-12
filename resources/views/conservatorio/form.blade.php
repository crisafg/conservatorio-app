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
    .active{
        transform:translateX(100%);
    }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-600 to-blue-700 text-gray-100">
    <nav class="absolute w-16 h-screen mt-[50px]">
        <div class="flex flex-wrap  flex-col justify-center content-between rounded-md h-screen  text-black ">         
            <button class="w-12">
                <span class="material-symbols-outlined">
                    chevron_left
                </span>
            </button>
            
            <button class="w-12" type="submit">
                <span class="material-symbols-outlined">
                    add
                    </span>
            </button>
            
            <a href="/src/pianista2.html">
                <button class="btnDerecha w-12">
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </button>
            </a>
            
            <button class="w-12 " type="submit">
                <i class="fa-sharp fa-solid fa-eraser fa-2xl text-center"></i>
            </button>
        </div>
    </nav>

    <header class="flex flex-wrap ">
        <a class="h-12 text-black cursor-pointer" href="{{ asset('/conservatorio') }}">
            <button>
                <span class="material-symbols-outlined">home</span>
            </button>
        </a>    
    </header>
    
    
    <section class="flex ml-20">
        <div>
            <ul class="grid grid-cols-2 items-baseline">
                <form id="formulario_1" action="{{ url('/conservatorio') }}" method="post" enctype="multipart/form-data" class="contents">
                    @csrf

                    <!-- <div class="absolute right-64 top-1 flex flex-wrap items-center">
                        <img class="w-[2.7rem]" src="{{ asset('/img/add_photo.png') }}" alt="Agregar foto">
                        <input class="relative top-[3px] left-4" type="file" name="imagen" id="imagen">
                    </div> -->
                    
                    <label class="caracteristicas" for="Nombre">Nombres</label>
                    <input class="values" type="text" name="Nombre" value="Juan Diego">

                    <label class="caracteristicas" for="Apellido">Apellidos</label>
                    <input class="values" type="text" name="Apellido" value="Rodriguez Perez">
                    
                    <label class="caracteristicas" for="Cédula">Cédula</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" id="numbers" minlength="1" maxlength="8" name="Cédula" type="number" value="54267854">

                    <label class="caracteristicas" for="Edad">Edad</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" min="6" minlength="1" maxlength="2" name="Edad" type="number" value="15">
                
                    <label class="caracteristicas" for="Fecha de nacimiento">Fecha de nacimiento</label>
                    <input class="values w-44" name="Fecha de nacimiento" type="date" value="2008-01-08">
                
                    <label class="caracteristicas" for="Teléfono">Teléfono</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="8" name="Teléfono" type="tel" value="47312345">

                    <label class="caracteristicas" for="Domicilio">Domicilio</label>
                    <input class="values" type="text" name="Domicilio" value="Square 1298">

                    <label class="caracteristicas" for="">Nombre del padre</label>
                    <input class="values" type="text" name="Nombre del padre" value="Juan Rodriguez">

                    <label class="caracteristicas" for="">Nombre de la madre</label>
                    <input class="values" type="text" name="Nombre de la madre" value="Luisa Perez">
                
                    <label class="caracteristicas" for="">Nombre del tutor</label>
                    <input class="values" type="text" name="Nombre del tutor" value="">

                    <label class="caracteristicas" for="Fecha de ingreso">Fecha de Ingreso</label>
                    <input class="values" maxlength="2" type="date" name="Fecha de ingreso" value="2020-08-04">
            
                    <label class="caracteristicas" for="Celular">Celular</label>
                    <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    class="values" minlength="1" maxlength="9" type="number" name="Celular" value="09912345">
                </form> 
            </div>
                    <!-- Escolaridad -->                 
                        <div id="escolaridad" class=" mt-2.5 relative right-2">
                            <table class="border-2">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Curso</th>
                                    <th>Calificación</th>
                                    <th>Faltas</th>
                                    <th>Observación</th>
                                </tr>
            
                                <tr>
                                    <form action="{{ url('/conservatorio') }}" method="post">
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td id="date" class="w-1/12 bg-slate-50">
                                        <input class="w-full" type="date" name="" id="">
                                    </td>
                                    <td id="curso" class="bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" maxlength="1" min="1" max="6" type="number" name="" id="">
                                    </td>
                                    <td id="instrumento" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2<" type="number" name="" id="">
                                    </td>
                                    <td id="lecto" class="w-2 bg-slate-50">
                                        <input oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        class="w-full text-center" min="1" max="12" maxlength="2" type="number" name="" id="">
                                    </td>
                                    <td id="observacion" class="w-64 bg-slate-50">
                                        <input class="w-full" type="text" name="" id="">
                                    </td>
                                </tr>       
                            </table>
                            </form>

                        </div>
                    </form>
            </ul>

        </section>
        
        <footer class=" mt-8 ">
            <div class="relative right-32 flex justify-evenly items-center "> 
                <input class="bg-white hover:opacity-70 w-28 h-10 rounded-3xl uppercase cursor-pointer" type="submit" value="Confirmar">
                <div class="relative" id="container">
                    <div class=" bg-white w-[4.5rem] rounded-3xl h-10 flex items-center " id="toggle">
                        <div class="toggle absolute bg-blue-700 left-1 cursor-pointer top-1 w-8 h-8 rounded-3xl transition-all duration-300 delay-150" id="toggle-button"></div>
                        <p class="absolute left-24 font-medium text-lg uppercase transition-all duration-300 delay-[600ms]" id="text">Lectoescritura</p>
                    </div>
                </div>
            </div>
        </footer>
</body>
<script>
    const toggleBtn= document.querySelector('#toggle-button');
    let text= document.querySelector('#text');
    toggleBtn.addEventListener('click', ()=>{
        if(!toggleBtn.classList.contains('active')){
            toggleBtn.classList.toggle('active');
            text.innerHTML='Instrumento';
        }else{
            toggleBtn.classList.toggle('active');
            text.innerHTML='Lectoescritura';
        }
    });
    </script>
</html>