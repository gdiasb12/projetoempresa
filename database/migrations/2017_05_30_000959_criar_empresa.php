<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function($table)
        {
            $table->increments('id');
            $table->string('email', 255)->unique();
            $table->string('cnpj', 25);
            $table->string('logradouro', 255);
            $table->integer('numero_endereco');
            $table->string('cidade_endereco', 255);
            $table->string('bairro_endereco', 255);
            $table->string('cep_endereco', 15);
            $table->string('nome_fantasia', 255)->unique();
            $table->string('razao_social', 255)->unique();
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario')->on_delete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
