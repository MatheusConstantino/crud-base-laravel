<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposOracao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_oracao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('coordenador');
            $table->integer('telefone');
            $table->string('email');
            $table->string('vice');
            $table->integer('telefone_vice');
            $table->string('email_vice');
            $table->string('dia_encontros');
            $table->time('hora_encontro');
            $table->string('dia_intercessao');
            $table->time('hora_intercessao');
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
        Schema::dropIfExists('grupos_oracao');
    }
}
