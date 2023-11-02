<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnosController;
use App\Models\Escolaridad;
use App\Models\Alumno;
use App\Models\Alumnos;
use Illuminate\Http\Request;

class EscolaridadController extends Controller
{
    public function index()
    {
        $escolaridad = Escolaridad::all();
        return view('carnet.index', ['escolaridad' => $escolaridad]);
    }

    public function __construct()
    {
        // Constructor vacío
    }

    public function store(Request $request)
    {
        $fechaEscolaridad = $request->input('FechaEscolaridad');
        $cursoEscolaridad = $request->input('CursoEscolaridad');
        $calificacionEscolaridad = $request->input('CalificacionEscolaridad');
        $faltas = $request->input('Faltas');
        $observacion = $request->input('Observacion'); 
        $id= $request->input('id');
        // Obtener el ID del último registro de la tabla principal
        $ultimoId = Alumno::max('id');
        
        $datosEscolaridad= [];
        for ($i = 0; $i < count($fechaEscolaridad); $i++) {
            $datosEscolaridad[]= Escolaridad::create([
                    'FechaEscolaridad' => $fechaEscolaridad[$i],
                    'CursoEscolaridad' => $cursoEscolaridad[$i],
                    'CalificacionEscolaridad' => $calificacionEscolaridad[$i],
                    'Faltas' => $faltas[$i],
                    'Observacion' => $observacion[$i],
                    'alumnos_id' => $ultimoId, // Asignar el ID del último registro
                ]);
        }

         // Guardar los datos en la sesión
        // session()->flash('fechaEscolaridad', $fechaEscolaridad);
        // session()->flash('cursoEscolaridad', $cursoEscolaridad);
        // session()->flash('calificacionEscolaridad', $calificacionEscolaridad);
        // session()->flash('faltas', $faltas);
        // session()->flash('observacion', $observacion);

        // $datosAlumnoInferior = [
        //     'Foto' => $request->file('Foto'),
        //     'Nombre' => $request->input('Nombre'),
        //     'Apellido' => $request->input('Apellido'),
        //     'Curso' => $request->input('Curso'),
        //     'Cedula' => $request->input('Cedula'),
        //     'Edad' => $request->input('Edad'),
        //     'FechaNacimiento' => $request->input('FechaNacimiento'),
        //     'Telefono' => $request->input('Telefono'),
        //     'Domicilio' => $request->input('Domicilio'),
        //     'FechaIngreso' => $request->input('FechaIngreso'),
        //     'Celular' => $request->input('Celular'),
        // ];
        
        // // Insertar los datos del alumno en la base de datos
        // $alumnoId = Alumno::insertGetId($datosAlumno);

        // // Combinar los datos de ambas funciones
        // $datosAlumno = array_merge($datosAlumno, $datosAlumnoInferior);

        // Guardar los datos en la sesión
        // session()->flash('rutaImagen', $datosAlumno['Foto']);
        // session()->flash('datosEnviados', 'Alumno agregado con éxito');

        // return redirect()->route('alumnos.show');
        $alumnos = Alumno::with('escolaridades', 'instrumentos');
        session(['datosEscolaridad'=> $datosEscolaridad]);
        session(['fechaEscolaridad'=> $fechaEscolaridad]);
        // $datosAlumno = session('datosAlumno');
        // session()->forget(['datosAlumno', 'datosEscolaridad']);

        // session()->forget(['datosAlumno', 'datosEnviados']);
        $idsEscolaridad = collect($datosEscolaridad)->pluck('id')->toArray();
        
        return redirect()->action([AlumnoController::class, 'create'], ['id' => $idsEscolaridad[0]])
        ->withInput();
        // return redirect()->route('alumnos.show');

            // ->withInput();

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
        // $datosLecto = $request->except('_token', '_method');
        // Escolaridad::where('id', '=', $id)->update($datosLecto);
        // $escolaridad = Escolaridad::findOrFail($id);
        $fechaEscolaridad = $request->input('FechaEscolaridad');
        $cursoEscolaridad = $request->input('CursoEscolaridad');
        $calificacionEscolaridad = $request->input('CalificacionEscolaridad');
        $faltas = $request->input('Faltas');
        $observacion = $request->input('Observacion'); 
        $id= $request->input('id');
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
        // \Log::info("Actualización completada para el ID: $id");
        return redirect()->action([AlumnosController::class, 'show']);
    }
    /**
     * Remove the specified resource from storage.
     */

}

