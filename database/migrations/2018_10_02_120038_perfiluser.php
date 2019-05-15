<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Perfiluser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiluser',function(Blueprint $table){

            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->string('usercreate');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('perfiluser',function(Blueprint $table){

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_perfil')->references('id')->on('perfil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiluser');
    }
}
