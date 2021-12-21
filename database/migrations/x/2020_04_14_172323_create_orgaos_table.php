<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgaos', function (Blueprint $table) {
            $table->increments('id_orgao');
            $table->string('nome_orgao', 100);
            $table->string('sigla_orgao', 30);
            $table->integer('tipo_orgao_id')->unsigned();
            $table->foreign('tipo_orgao_id')->references('id_tipo_orgao')->on('tipo_orgao');            
            $table->string('video', 20)->nullable();
            $table->string('audio', 20)->nullable();
            $table->string('explicacao', 800)->nullable();
            $table->string('palavra_chave', 255)->nullable();
            $table->string('link', 200)->nullable();
            $table->string('cnpj', 20)->nullable();
            $table->integer('orgao_pai')->nullable();
            $table->integer('exibir_tipo')->nullable();
            $table->char('status', 1)->default('S');
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
        Schema::dropIfExists('orgaos');
    }
}
