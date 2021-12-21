<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaPendenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_pendencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('OCO_PEN_OCORRENCIA_ID')->unsigned();
            $table->foreign('OCO_PEN_OCORRENCIA_ID')->references('id_ocorrencia')->on('ocorrencias'); 
            $table->string('OCO_PEN_MOTIVO', 2000);
            $table->dateTime('OCO_PEN_DATA')->nullable();
            $table->integer('OCO_PEN_RESPONSAVEL_ID')->unsigned();
            $table->foreign('OCO_PEN_RESPONSAVEL_ID')->references('id_responsavel')->on('responsaveis');
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
        Schema::dropIfExists('ocorrencia_pendencia');
    }
}
