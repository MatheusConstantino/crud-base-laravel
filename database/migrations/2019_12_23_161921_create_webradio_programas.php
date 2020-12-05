<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebradioProgramas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webradio_programas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_programa');
            $table->string('titulo');
            $table->integer('media_id');
            $table->integer('locutor_id');
            $table->text('descricao');
            $table->enum('status', ['ativo','inativo','removido']);

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
        Schema::dropIfExists('webradio_programas');
    }
}
