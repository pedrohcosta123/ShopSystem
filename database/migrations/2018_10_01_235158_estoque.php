<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Estoque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cat')->unsigned();
            $table->string('codbarras');
            $table->integer('quantidade');
            $table->string('nome');
            $table->decimal('prc_custo',6,2);
            $table->decimal('prc_venda',6,2);
            $table->string('status');
            $table->string('user_cad');
            $table->timestamps();
        });

        Schema::table('estoque', function(Blueprint $table){

            $table->foreign('id_cat')->references('id')->on('categoria');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoque');
    }
}
