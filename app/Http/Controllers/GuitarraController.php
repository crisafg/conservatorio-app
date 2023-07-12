<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\Escolaridad;
use App\Models\Instrumento;
use App\Models\Guitarra;

use Illuminate\Http\Request;

class GuitarraController extends Controller
{
    //
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
        $guitarra = Guitarra::all();
        return view('guitarristas.index', ['guitarra' => $guitarra]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('guitarristas.create');
    }

    /**
     * Store a newly created resource in storage.
     * Guarda los datos del formulario
     */
    public function store(Request $request)
    {
        //
        $datosGuitarristas = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosGuitarristas['Foto'] = $request->file('Foto')->store('uploads','public');
        }

        // haz lo que necesites con los datos recibidos
        
        Guitarra::insert($datosGuitarristas);
        return response()->json($datosGuitarristas);
    }


    public function show($id)
    {
        //
        $guitarra= Guitarra::find($id);
        
        return view('guitarristas.show', ['guitarra' => $guitarra]);;
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $guitarra= Guitarra::findOrFail($id);
        return view('guitarristas.edit', compact('guitarra'));
    }

    /**
     * Update the specified resource in storage.
     */
//     public function update(Request $request, $id)
//     {
        
//         $datosGuitarristas = request()->except('_token', '_method');
//         if($request->hasFile('Foto')){
//             $guitarra=Guitarra::findOrFail($id);
//             Storage::delete('public/'.$guitarra->Foto);   
//             $datosGuitarristas['Foto'] = $request->file('Foto')->store('uploads','public');
//         }

//         Guitarra::where('id', '=', $id)->update($datosAlumno);
//         $alumno=Alumno::findOrFail($id);
//         return view('conservatorio.edit', compact('alumno'));
//     }
// }
}