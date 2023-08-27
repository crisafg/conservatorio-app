<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('alumnos')){
            Schema::create('alumnos', function (Blueprint $table) {
                $table->engine = 'InnoDB';  
                $table->id();
                $table->string('Curso');
                $table->string('Foto');
                $table->string('Nombre');
                $table->string('Apellido');
                $table->string('Cedula');
                $table->string('Edad');
                $table->string('FechaNacimiento');
                $table->string('Telefono');
                $table->string('Domicilio');
                $table->string('NombrePadre')->nullable();
                $table->string('NombreMadre')->nullable();
                $table->string('NombreTutor')->nullable();
                $table->string('FechaIngreso');
                $table->string('Celular');
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
