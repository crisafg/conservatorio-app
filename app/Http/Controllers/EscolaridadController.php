<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AlumnoController;
use App\Models\Escolaridad;
use App\Models\Alumno;
use Illuminate\Http\Request;

class EscolaridadController extends Controller
{
    public function index()
    {
        $escolaridad = Escolaridad::all();
        return view('carnet.index', ['escolaridad' => $escolaridad]);
    }

    public function store(Request $request)
    {
        $escolaridades_id = $request->input('escolaridades_id');
        $fechaEscolaridad = $request->input('FechaEscolaridad');
        $cursoEscolaridad = $request->input('CursoEscolaridad');
        $calificacionEscolaridad = $request->input('CalificacionEscolaridad');
        $faltas = $request->input('Faltas');
        $observacion = $request->input('Observacion');
        // Obtener el ID del último registro de la tabla principal
        $ultimoId = Alumno::max('id');
        
        for ($i = 0; $i < count($fechaEscolaridad); $i++) {
            Escolaridad::create([
                'escolaridades_id' => $escolaridades_id[$i],
                'FechaEscolaridad' => $fechaEscolaridad[$i],
                'CursoEscolaridad' => $cursoEscolaridad[$i],
                'CalificacionEscolaridad' => $calificacionEscolaridad[$i],
                'Faltas' => $faltas[$i],
                'Observacion' => $observacion[$i],
                'alumnos_id' => $ultimoId, // Asignar el ID del último registro
            ]);
        }
        return response()->json($request->all());
    }
    

   public function show(Escolaridad $escolaridad)
   {
       //
       $datos['carnet']= Escolaridad::paginate();
       return view('carnet.show', $datos);
   }

   public function edit($escolaridades_id)
    {
        //
        $escolaridad = Escolaridad::findOrFail($escolaridades_id);
        return view('carnet.edit', compact('escolaridad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $escolaridades_id)
    {
        //
        $datosLecto = $request->except('_token', '_method');
        Escolaridad::where('escolaridades_id', '=', $escolaridades_id)->update($datosLecto);
        $escolaridad = Escolaridad::findOrFail($escolaridades_id);
        return view('carnet.edit', compact('escolaridad'));
    }
    /**
     * Remove the specified resource from storage.
     */

}

