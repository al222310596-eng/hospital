<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table){
            $table->bigIncrements('id_paciente');
            $table->string('clave', 30);
            $table->string('nombre', 30);
            $table->string('app', 30);
            $table->date('fn', 30);
            $table->string('sexo', 30);
            $table->string('foto', 255);
            $table->boolean('activo', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
