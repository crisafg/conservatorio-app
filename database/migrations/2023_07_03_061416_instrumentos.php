<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;
use Illuminate\Support\Facades\DB;

DB::statement('SET FOREIGN_KEY_CHECKS = 0;');


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        if (!Schema::hasTable('instrumentos')) {
            Schema::create('instrumentos', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->id();
                $table->bigInteger('alumnos_id')->unsigned()->index()->nullable();
                $table->foreign('alumnos_id')->references('id')->on('alumnos')->onDelete('cascade');
                $table->date('FechaInstrumento')->nullable();
                $table->string('CursoInstrumento')->nullable();
                $table->string('CalificacionInstrumento')->nullable();
                $table->string('FaltasInstrumento')->nullable();
                $table->string('ObservacionInstrumento')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        {
            Schema::dropIfExists('instrumentos');
        }
    }
};
