<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Slide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides',function(BluePrint $table){
            $table->id();
            $table->string('imagem');
            $table->string('url')->nullable();
            $table->boolean('ativado')->default(false);
            $table->date('data_inicial')->nullable();
            $table->date('data_final')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
