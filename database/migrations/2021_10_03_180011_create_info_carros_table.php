<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_carros', function (Blueprint $table) {
            $table->id();
            $table->string('nome_veiculo');
            $table->string('link');
            $table->string('ano');
            $table->string('combustivel');
            $table->string('portas');
            $table->string('quilometragem');
            $table->string('cambio');
            $table->string('cor');
            $table->timestamps();
        });

        Schema::table('info_carros', function($table)
        {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_carros');
    }
}
