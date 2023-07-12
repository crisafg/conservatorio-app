<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guitarra extends Model
{
    use HasFactory;
    public function escolaridades()
    {
        return $this->hasMany(Escolaridad::class, 'alumnos_Curso');
    }
    public function instrumentos()
    {
        return $this->hasMany(Instrumento::class, 'alumnos_Curso');
    }
}
