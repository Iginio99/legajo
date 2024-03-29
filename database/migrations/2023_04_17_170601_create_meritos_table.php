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
        Schema::create('meritos', function (Blueprint $table) {
            $table->id();
            $table->string('denominacion');
            $table->string('institucion');
            $table->string('year');
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
        Schema::dropIfExists('meritos');
    }
};
