<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsavelAplicacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavel_aplicacao', function (Blueprint $table) {
            $table->increments('id_responsavel');
            $table->integer('aplicacao_id')->unsigned();
            $table->foreign('aplicacao_id')->references('id_aplicacao')->on('aplicacoes'); 
            $table->integer('tipo_responsavel_id')->unsigned();
            $table->foreign('tipo_responsavel_id')->references('id_tipo_responsavel')->on('responsavel_tipo');
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
        Schema::dropIfExists('responsavel_aplicacao');
    }
}
