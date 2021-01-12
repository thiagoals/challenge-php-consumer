<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('itens', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->integer('quantidade');
            $table->double('preco');
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
        Schema::dropIfExists('itens');
    }
}
