<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->string('domicilio_actual');
            $table->string('telefono');
            $table->string('celular');
            $table->string('sistema_pension');
            $table->string('cuspp');
            $table->string('correo');
            $table->string('idioma');
            $table->string('foto')->nullable($value = true);
            $table->unsignedBigInteger('idUsuario');
            $table->timestamps();

            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};
