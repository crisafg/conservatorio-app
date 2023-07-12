<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;
    public $table = "instrumentos";
    protected $fillable = [
        'FechaInstrumento',
        'CursoInstrumento',
        'CalificacionInstrumento',
        'FaltasInstrumento',
        'ObservacionInstrumento',
        'alumnos_id'
        // Otros campos del modelo...
    ];
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumnos_id');
    }
}
