<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function(Blueprint $table){
            $table->integer('id'); 
            $table->integer('id_estoque')->unsigned();
            $table->decimal('vl_desconto',6,2);
            $table->string('usercreate'); 
            $table->timestamps();             

        });
        Schema::table('compra', function(Blueprint $table){

            $table->foreign('id_estoque')->references('id')->on('estoque');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfexists('compra');
    }
}
