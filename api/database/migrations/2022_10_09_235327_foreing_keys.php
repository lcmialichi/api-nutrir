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
        Schema::table("usuario_acesso", function (BluePrint $table) {
            $table->foreign("usuario_id")
                ->references("id")
                ->on("usuario")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });

        Schema::table("usuario_endereco", function (BluePrint $table) {
            $table->foreign("usuario_id")
                ->references("id")
                ->on("usuario")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });

        Schema::table("usuario_contato", function (BluePrint $table) {
            $table->foreign("usuario_id")
                ->references("id")
                ->on("usuario")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });

        Schema::table("atendimento", function (BluePrint $table) {
            $table->foreign("atendente_usuario_id")
                ->references("id")
                ->on("usuario")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign("atendido_usuario_id")
                ->references("id")
                ->on("usuario")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });

        Schema::table("atendimento_log", function (BluePrint $table) {
            $table->foreign("atendimento_id")
                ->references("id")
                ->on("usuario")
                ->onDelete("cascade")
                ->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
