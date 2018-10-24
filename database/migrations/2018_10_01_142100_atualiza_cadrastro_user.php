<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AtualizaCadrastroUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('servidor')->nullable();
            $table->boolean('tipo_pessoa')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('nome_empresa')->nullable();
            $table->string('cpf_coordenador')->nullable();
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
