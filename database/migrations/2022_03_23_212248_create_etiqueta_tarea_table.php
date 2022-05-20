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
        Schema::create('etiqueta_tarea', function (Blueprint $table) {
            // Constrained nos permite crear integridad referencial
            // evitando que se borre si ya hay una referencia
            $table->foreignId('etiqueta_id')->constrained();
            $table->foreignId('tarea_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiqueta_tarea');
    }
};
