<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Entradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->comment('enuncia el contenido de la entrada');
            $table->string('autor')->comment('el nombre de quien publica la entrada');
            $table->date('fecha')->comment('fecha en que la entrada fue guardada');
            $table->text('contenido')->comment('escrito breve');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('entradas');
    }
}
