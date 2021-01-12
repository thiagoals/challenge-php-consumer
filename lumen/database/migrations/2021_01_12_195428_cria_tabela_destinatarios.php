<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaDestinatarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('destinatarios', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('pais');
            $table->integer('id_ordem');
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
        Schema::dropIfExists('destinatarios');
    }
}
