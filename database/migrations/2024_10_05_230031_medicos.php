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
        Schema::create('medicos', function (Blueprint $table){
            $table->bigIncrements('id_medico');
            $table->string('clave', 30);
            $table->string('nombre', 30);
            $table->string('app', 30);
            $table->date('fn');
            $table->string('sexo');
            $table->string('foto');
            $table->string('email');
            $table->boolean('activo', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
