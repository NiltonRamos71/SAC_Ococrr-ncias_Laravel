<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postos', function (Blueprint $table) {
            $table->increments('id_posto');
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id_unidade')->on('unidades');
            $table->integer('LIMITE_HORA_MARCADA')->nullable();
            $table->integer('ANTECEDENCIA_HORA_MARCADA')->nullable();
            $table->integer('INTERVALO_MINIMO')->nullable();
            $table->string('SID', 4)->nullable()->nullable();
            $table->integer('DIA_LIMITE_ESTATISTICA')->nullable();
            $table->string('URL_ATENDE', 100)->nullable();
            $table->char('AGE_ATENDE', 1)->default('0');
            $table->char('POSSUI_AUTOATENDIMENTO', 1)->default('0');
            $table->char('AGE_MONITORAR', 1)->default('0');
            $table->integer('ORDEM_AGEND')->nullable();           
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
        Schema::dropIfExists('postos');
    }
}
