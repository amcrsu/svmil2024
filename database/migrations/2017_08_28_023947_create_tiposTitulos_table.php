<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiposTitulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipoTitulo');
            $table->decimal('pontuacao', 8,1);
            $table->integer('categoriaId')->unsigned();
            $table->foreign('categoriaId')->references('id')->on('categorias');
            $table->integer('etapaId')->unsigned();
            $table->foreign('etapaId')->references('id')->on('etapas');
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
        Schema::dropIfExists('tiposTitulos');
    }
}
