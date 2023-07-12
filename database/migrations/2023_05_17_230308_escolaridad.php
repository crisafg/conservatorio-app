<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\DB;

// DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // if (!Schema::hasTable('escolaridades')) {
        //     Schema::create('escolaridades', function (Blueprint $table) {
        //         $table->engine = 'InnoDB';
        //         $table->id();
        //         $table->date('FechaEscolaridad');
        //         $table->string('CursoEscolaridad');
        //         $table->string('CalificacionEscolaridad');
        //         $table->string('Faltas');
        //         $table->string('fdsfsdfsdfsd');
        //         $table->string('Observacion');
        //         $table->string('asnasjfnj');
        //         $table->bigInteger('alumno_id')->nullable();
        //         $table->foreign('alumno_id')->references('id')->on('alumnos');
        //         $table->timestamps();
        //     });
        // }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        // {
        //     Schema::dropIfExists('escolaridades');
        // }
    }
};
