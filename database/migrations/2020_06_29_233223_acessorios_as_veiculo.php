<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AcessoriosAsVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessorios_as_veiculo',function(Blueprint $table){
            $table->unsignedBigInteger('id_acessorio');
            $table->unsignedBigInteger('id_veiculo');
            $table->primary(['id_acessorio','id_veiculo']);
            $table->timestamps();

            $table->foreign('id_acessorio')->references('id')->on('acessorio')->onDelete('cascade');
            $table->foreign('id_veiculo')->references('id')->on('veiculo')->onDelete('cascade');
            
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Shema::dropIfExists('acessorios_as_veiculo');
    }
}
