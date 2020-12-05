<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelulasEstudo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celulas_estudo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('intervalo');
            $table->string('tema');
            $table->text('salmo');
            $table->text('leitura');
            $table->text('texto');
            $table->text('perguntas');
            $table->text('aviso');
            $table->text('entrega');
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
        Schema::dropIfExists('celulas_estudo');
    }
}
