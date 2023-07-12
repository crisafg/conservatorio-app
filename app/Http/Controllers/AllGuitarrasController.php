<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllGuitarrasController extends Controller
{
    //
    public function show($alumnos)
    {
        //
        $alumnos = Alumno::with('escolaridades', 'instrumentos')->get();
        return view('alumnos.vistaGeneral', ['alumnos' => $alumnos]);
    }
}
