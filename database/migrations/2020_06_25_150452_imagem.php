<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem',function(Blueprint $table){
            $table->id();
            $table->string('path')->nullable();
            $table->unsignedBigInteger('veiculo');
            $table->boolean('capa')->default(false);
            $table->timestamps();

            $table->foreign('veiculo')->references('id')->on('veiculo')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagem');
    }
}
