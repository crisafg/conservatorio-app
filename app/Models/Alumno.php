<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    
    public function escolaridades()
    {
        return $this->hasMany(Escolaridad::class, 'alumnos_id');
    }
    public function instrumentos()
    {
        return $this->hasMany(Instrumento::class, 'alumnos_id');
    }
}
