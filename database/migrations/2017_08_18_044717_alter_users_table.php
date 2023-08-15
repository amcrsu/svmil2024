<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('situacaoId')->unsigned();
            $table->foreign('situacaoId')->references('id')->on('situacoes');

            $table->integer('orgaoExpedId')->unsigned();
            $table->foreign('orgaoExpedId')->references('id')->on('orgaosExpedidores');

            $table->integer('ufOrgaoExpedId')->unsigned();
            $table->foreign('ufOrgaoExpedId')->references('id')->on('estados');

            $table->integer('estadoCivilId')->unsigned();
            $table->foreign('estadoCivilId')->references('id')->on('estadosCivis');

            $table->integer('tipoDocMilId')->unsigned();
            $table->foreign('tipoDocMilId')->references('id')->on('tiposDocMilitar');

            $table->integer('forcaId')->unsigned()->nullable();
            $table->foreign('forcaId')->references('id')->on('forcas');

            $table->integer('cidadeEndId')->unsigned();
            $table->foreign('cidadeEndId')->references('id')->on('cidades');

            $table->integer('cidadeNascId')->unsigned();
            $table->foreign('cidadeNascId')->references('id')->on('cidades');
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
    }
}
