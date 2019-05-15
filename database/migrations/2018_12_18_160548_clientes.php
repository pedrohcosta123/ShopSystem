<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function(Blueprint $table){

            $table->increments('id');
            $table->string('nome');
            $table->integer('CPF');
            $table->string('RG');
            $table->string('end');
            $table->string('fonecelular');
            $table->string('fonefixo');
            $table->string('status');
            $table->string('usercreate');
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
        Schema::dropIfExists('clientes');
    }
}
