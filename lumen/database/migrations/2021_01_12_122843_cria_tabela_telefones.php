<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaTelefones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('telefones', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('telefone');
            $table->unsignedInteger('id_pessoa');
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
        Schema::dropIfExists('telefones');
    }
    /*
    Schema::table('telefones', function(Blueprint $table){
        // Telefones tem que ir para a tabela de telefones
        $table->foreign('id_pessoa')->references('id')->on('pessoas');
    });
    */
}
