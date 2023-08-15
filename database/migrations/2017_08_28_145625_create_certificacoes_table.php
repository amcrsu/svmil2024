<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipoTituloId')->unsigned();
            $table->foreign('tipoTituloId')->references('id')->on('tiposTitulos');
            $table->string('nome');
            $table->date('dtCertificacao');
            $table->integer('inscricaoId')->unsigned();
            $table->foreign('inscricaoId')->references('id')->on('inscricoes');
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
        Schema::dropIfExists('certificacoes');
    }
}
