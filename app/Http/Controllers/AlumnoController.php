<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
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
        $datosAlumno = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads','public');
        }

        // haz lo que necesites con los datos recibidos
        
        Alumno::insert($datosAlumno);
        return response()->json($datosAlumno);
    }


    public function show($id)
    {
        //
        $alumno= Alumno::find($id);
        
        return view('conservatorio.show', ['alumno' => $alumno]);;
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $alumno=Alumno::findOrFail($id);
        return view('conservatorio.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosAlumno = request()->except('_token', '_method');
        if($request->hasFile('Foto')){
            $alumno=Alumno::findOrFail($id);
            Storage::delete('public/'.$alumno->Foto);   
            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads','public');
        }

        Alumno::where('id', '=', $id)->update($datosAlumno);
        $alumno=Alumno::findOrFail($id);
        return view('conservatorio.edit', compact('alumno'));
    }

    /**
     * Remove the specified resource from storage.
     */
}
