<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Veiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo', function( Blueprint $table ){
            $table->id();
            $table->unsignedBigInteger('marca');
            $table->unsignedBigInteger('modelo');
            $table->unsignedBigInteger('ano');
            $table->unsignedBigInteger('motor');
            $table->unsignedBigInteger('combustivel');
            $table->integer('portas')->default(2);
            $table->boolean('ativado')->default('0');
            $table->unsignedDecimal('preco')->default(0.0);
            $table->string('obs')->nullable();
            $table->timestamps();
        });

        Schema::table('veiculo', function( Blueprint $table ){
            $table->foreign('marca')->references('id')->on('marca');
            $table->foreign('modelo')->references('id')->on('modelo');
            $table->foreign('ano')->references('id')->on('ano');
            $table->foreign('motor')->references('id')->on('motor');
            $table->foreign('combustivel')->references('id')->on('combustivel');
            
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculo');
    }
}
