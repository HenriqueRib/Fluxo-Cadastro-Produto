<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaPerguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas',
            function (Blueprint $table){
                $table->integer('produto_id');
                $table->bigIncrements('id');
                $table->date('data_inicio');
                $table->date('data_final');
                $table->string('tipo_veiculo');
                $table->string('retirado');
                $table->string('devolucao');


                $table->foreign('produto_id')
                    ->references('id')
                    ->on('produtos');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perguntas');
    }

}
