<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
// use App\Models\Alumnos;
use App\Models\Escolaridad;
use App\Models\Instrumento;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    //
    public function show()
    {
        //
        $alumnos = Alumno::with('escolaridades', 'instrumentos')
        ->orderBy('Curso', 'asc')
        ->paginate(6);  
        // $alumnos->setPath('alumnos/vistaGeneral');

        // ->get();
        return view('alumnos.vistaGeneral', ['alumnos' => $alumnos]);
    }


    public function destroy($id)
    {
        //
        Alumno::destroy($id);
        Escolaridad::destroy($id);
        Instrumento::destroy($id);
        return redirect('alumnos/vistaGeneral');
    }
}
