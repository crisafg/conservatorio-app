<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Alumnos;
use App\Models\Escolaridad;
use App\Models\Instrumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AlumnoController extends Controller
{
    public function escolaridades()
    {
        return $this->hasMany(Escolaridad::class);
    }
    public function instrumentos()
    {
        return $this->hasMany(Instrumento::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumno = Alumno::all();
        return view('conservatorio.index', ['alumno' => $alumno]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('conservatorio.create');
    }

    /**
     * Store a newly created resource in storage.
     * Guarda los datos del formulario
     */
        public function store(Request $request)
        {
            //
            $campos=[
                'Foto'=>'required|mimes:jpeg,png,jpg',
                'Nombre'=>'required|string',
                'Apellido'=>'required|string',
                'Curso'=>'required|string',
                'Cedula'=>'required|string',
                'Edad'=>'required|string',
                'FechaNacimiento'=>'required|string',
                'Telefono'=>'required|string',
                'Domicilio'=>'required|string',
                'FechaIngreso'=>'required|string',
                'Celular'=>'required|string',
            ];
            $mensaje=[
                'required'=> 'No ingresó el :attribute',
                'Foto.required'=> 'No ingresó la foto',
                'Edad.required'=> 'No ingresó la edad',
                'Cedula.required'=> 'No ingresó la cédula',
                'FechaNacimiento.required'=> 'No ingresó la fecha de nacimiento',
                'FechaIngreso.required'=> 'No ingresó la fecha de ingreso',
            ];

            $this->validate($request, $campos, $mensaje);
            
            $datosAlumno = request()->except('_token');
            if ($request->hasFile('Foto')) {
                $rutaImagen = $request->file('Foto')->store('uploads', 'public');
                $datosAlumno['Foto'] = $rutaImagen;
            }   

            session([
                'datosAlumno' => $datosAlumno,
                'rutaImagen' => $rutaImagen,
                'datosEnviados' => 'Alumno agregado con éxito',
            ]);
            
            // session()->forget(['datosAlumno', 'datosEnviados']);
            
            $alumnoId = Alumno::insertGetId($datosAlumno);
            return redirect()->action([AlumnoController::class, 'create'], ['id' => $alumnoId])
            ->with('rutaImagen', $datosAlumno['Foto'])
            ->with('datosEnviados', 'Alumno agregado con éxito')
            ->withInput();
        }


    public function show($id)
    {
        //
        $alumno= Alumno::find($id);
        
        return view('conservatorio.show', ['alumno' => $alumno]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $alumno=Alumno::findOrFail($id);
        $escolaridad= $alumno->escolaridades;
        session()->forget(['datosUpdate']);
        return view('conservatorio.edit', compact('alumno', 'escolaridad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        //Alumno
        $datosAlumno = request()->except('_token', '_method');
        if($request->hasFile('Foto')){
            $alumno=Alumno::findOrFail($id);
            Storage::delete('public/'.$alumno->Foto);   
            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Alumno::where('id', '=', $id)->update($datosAlumno);
        $alumno=Alumno::findOrFail($id);
   
        // $datosEscolaridad = $request->input('escolaridad');
        // $fechaEscolaridad = $datosEscolaridad['FechaEscolaridad'];
        // $cursoEscolaridad = $datosEscolaridad['CursoEscolaridad'];
        // $calificacionEscolaridad = $datosEscolaridad['CalificacionEscolaridad'];
        // $faltasEscolaridad = $datosEscolaridad['CalificacionEscolaridad'];
        // $observacionEscolaridad = $datosEscolaridad['ObservacionEscolaridad'];
        
        session(['datosUpdate' => 'Datos actualizados con éxito']);
       
        return view('conservatorio.edit', compact('alumno'))
        ->with('datosUpdate', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
}
