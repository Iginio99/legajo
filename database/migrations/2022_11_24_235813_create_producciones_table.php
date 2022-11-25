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
        Schema::create('producciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('institucion');
            $table->string('year');
            $table->string('otro')->nullable($value = true);
            $table->string('documento')->nullable($value = true);
            $table->unsignedBigInteger('idDocente');
            $table->timestamps();

            $table->foreign('idDocente')->references('id')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producciones');
    }
};
