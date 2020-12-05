<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMensagensDiarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagens_diarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('mensagem');
            $table->string('passagem');
            $table->timestamp('inicio_publicacao');
            $table->timestamp('final_publicacao');
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
        Schema::dropIfExists('mensagens_diarias');
    }
}
