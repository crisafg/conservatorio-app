<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Instrumento;
use Illuminate\Http\Request;

class InstrumentoController extends Controller
{
    //
    
    public function index()
    {
        $instrumento = Instrumento::all();
        return view('instrumento.index', ['instrumento' => $instrumento]);
    }

    public function store(Request $request)
    {
        $fechaInstrumento = $request->input('FechaInstrumento');
        $cursoInstrumento = $request->input('CursoInstrumento');
        $calificacionInstrumento = $request->input('CalificacionInstrumento');
        $faltasInstrumento = $request->input('FaltasInstrumento');
        $observacion = $request->input('ObservacionInstrumento');
        
        // Obtener el ID del último registro de la tabla principal
        $ultimoId = Alumno::max('Curso');
        
        for ($i = 0; $i < count($fechaInstrumento); $i++) {
            Instrumento::create([
                'FechaInstrumento' => $fechaInstrumento[$i],
                'CursoInstrumento' => $cursoInstrumento[$i],
                'CalificacionInstrumento' => $calificacionInstrumento[$i],
                'FaltasInstrumento' => $faltasInstrumento[$i],
                'ObservacionInstrumento' => $observacion[$i],
                'alumnos_Id' => $ultimoId, // Asignar el ID del último registro
            ]);
        }
        return response()->json($request->all());
    }

    public function show(Instrumento $instrumento)
    {
        //
        $datos['instrumento']= Instrumento::paginate(4);
        return view('instrumento.show', $datos);
    }
 
}
