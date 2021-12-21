<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaNegadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_negada', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('OCO_NEG_OCORRENCIA_ID')->unsigned();
            $table->foreign('OCO_NEG_OCORRENCIA_ID')->references('id_ocorrencia')->on('ocorrencias');
            $table->string('OCO_NEG_MOTIVO', 2000);
            $table->dateTime('OCO_NEG_DATA')->nullable();
            $table->integer('OCO_NEG_RESPONSAVEL_ID')->unsigned();
            $table->foreign('OCO_NEG_RESPONSAVEL_ID')->references('id_responsavel')->on('responsaveis');
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
        Schema::dropIfExists('ocorrencia_negada');
    }
}
