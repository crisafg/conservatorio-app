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
        $fechaEscolaridad = $request->input('FechaEscolaridad');
        $cursoEscolaridad = $request->input('CursoEscolaridad');
        $calificacionEscolaridad = $request->input('CalificacionEscolaridad');
        $faltas = $request->input('Faltas');
        $observacion = $request->input('Observacion'); 
        // Obtener el ID del último registro de la tabla principal
        $ultimoId = Alumno::max('id');
        
        for ($i = 0; $i < count($fechaEscolaridad); $i++) {
            Escolaridad::create([
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

   public function edit($id)
    {
        //
        $escolaridad = Escolaridad::findOrFail($id);
        return view('carnet.edit', compact('escolaridad'));
    }

//     /**
//      * Update the specified resource in storage.
//      */
    public function update(Request $request, $id)
    {
        //
        $datosLecto = $request->except('_token', '_method');
        Escolaridad::where('id', '=', $id)->update($datosLecto);
        $escolaridad = Escolaridad::findOrFail($id);
        // \Log::info("Actualización completada para el ID: $id");
        return redirect()->action([AlumnoController::class, 'edit'], ['id' => $id]);
    }
    /**
     * Remove the specified resource from storage.
     */

}

