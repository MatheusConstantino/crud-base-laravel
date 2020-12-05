<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebradioProgramacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webradio_programacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('programa_id');
            $table->integer('locutor_id');
            $table->string('dia_semana');
            $table->time('horario_inicio');
            $table->time('horario_termino');
            $table->timestamp('data_inicio');
            $table->timestamp('data_final');
            $table->enum('status', ['ativo', 'pendente', 'inativo','removido']);
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
        Schema::dropIfExists('webradio_programacao');
    }
}
