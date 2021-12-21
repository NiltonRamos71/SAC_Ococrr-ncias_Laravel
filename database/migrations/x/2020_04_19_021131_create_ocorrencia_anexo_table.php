<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaAnexoTable extends Migration
{
    /**
     * Run the migrations.
     *$table->integer('id_ocorrencia');
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_anexo', function (Blueprint $table) {
            $table->integer('id_ocorrencia');
            $table->string('oco_ane_arquivo', 150);                    
            $table->integer('oco_ane_responsavel')->unsigned();
            $table->foreign('oco_ane_responsavel')->references('id_responsavel')->on('responsaveis');
            $table->dateTime('oco_ane_data')->nullable()->useCurrent = true;
            $table->string('oco_ane_descricao', 100);
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
        Schema::dropIfExists('ocorrencia_anexo');
    }
}
