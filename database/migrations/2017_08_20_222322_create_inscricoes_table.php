<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codInscricao');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->string('ip')->nullable();
            $table->integer('categoriaId')->unsigned();
            $table->foreign('categoriaId')->references('id')->on('categorias');
            $table->integer('areaId')->unsigned();
            $table->foreign('areaId')->references('id')->on('areas');
            $table->integer('subareaId')->unsigned()->nullable();
            $table->foreign('subareaId')->references('id')->on('subareas');
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
        Schema::dropIfExists('inscricoes');
    }
}
