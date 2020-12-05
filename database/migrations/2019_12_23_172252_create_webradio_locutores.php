<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebradioLocutores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webradio_locutores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->integer('media_id');
            $table->enum('status', ['ativo', 'inativo', 'removido']);
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
        Schema::dropIfExists('webradio_locutores');
    }
}
