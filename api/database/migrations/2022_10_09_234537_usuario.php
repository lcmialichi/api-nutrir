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
            $table->integer("nutricionista");
            $table->timestamps();
        });

        Schema::create("usuario_endereco", function (BluePrint $table){
            $table->integer("id", autoIncrement: true)->unsigned();
            $table->integer("usuario_id")->unsigned();
            $table->string("rua");
            $table->string("bairro");
            $table->string("cidade");
            $table->string("estado");
            $table->string("complemento");
            $table->timestamps();
        });

        Schema::create("usuario_contato", function (BluePrint $table){
            $table->integer("id", autoIncrement: true)->unsigned();
            $table->integer("usuario_id")->unsigned();
            $table->integer("ddd");
            $table->integer("telefone");
            $table->string("email");
            $table->timestamps();
        });

        Schema::create("atendimento", function (BluePrint $table){
            $table->integer("id", autoIncrement: true)->unsigned();
            $table->integer("atendente_usuario_id")->unsigned();
            $table->integer("atendido_usuario_id")->unsigned();
            $table->integer("status");
            $table->integer("tabulacao_id");
            $table->string("email");
            $table->timestamps();
        });

        Schema::create("tabulacao", function (BluePrint $table){
            $table->integer("id", autoIncrement: true)->unsigned();
            $table->string("descricao");
            $table->integer("status");
            $table->timestamps();
        });

        Schema::create("atendimento_log", function (BluePrint $table){
            $table->integer("id", autoIncrement: true)->unsigned();
            $table->integer("atendimento_id")->unsigned();
            $table->string("descricao");
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
        Schema::dropIfExists("usuario_contato");
        Schema::dropIfExists("usuario_endereco");
        Schema::dropIfExists("atendimento");
        Schema::dropIfExists("atendimento_log");
    }   

};
