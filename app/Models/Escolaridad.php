<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridad extends Model
{
    use HasFactory;
    public $table = "escolaridades";
    protected $fillable = [
        'alumnos_id',
        'FechaEscolaridad',
        'CursoEscolaridad',
        'CalificacionEscolaridad',
        'Faltas',
        'Observacion',
        // Otros campos del modelo...
    ];
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumnos_id');
    }
}
