<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("usuario", function (BluePrint $table){
            $table->integer("id", autoIncrement: true)->unsigned();
            $table->string("nome")->lenght(140);
            $table->bigInteger("cpf");
            $table->dateTime("nascimento");
            $table->timestamps();
        });
        
        Schema::create("usuario_acesso", function (BluePrint $table){
            $table->integer("id", autoIncrement: true)->unsigned();
            $table->integer("usuario_id")->unsigned();
            $table->string("acesso");
            $table->string("senha");
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
        Schema::dropIfExists("usuario");
        Schema::dropIfExists("usuario_acesso");
    }
};
