<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('senha');
            $table->string('cpf');
            $table->string('nomePai')->nullable();
            $table->string('nomeMae')->nullable();
            $table->float('altura');
            $table->enum('sexo', ['F','M']);
            $table->string('rg');
            $table->integer('numDependentes');
            $table->date('dtNascimento');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('complemento')->nullable();
            $table->string('telFixo')->nullable();
            $table->string('telCelular');
            $table->integer('anosSvPub');
            $table->integer('mesesSvPub');
            $table->integer('diasSvPub');
            $table->string('idtMil')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
