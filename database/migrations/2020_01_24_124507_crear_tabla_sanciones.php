<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSanciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('legajo')->lenght(20)->unique();
            $table->string('nombre')->lenght(100);
            $table->string('apellido')->lenght(100);
            $table->integer('dni')->lenght(8);
            $table->integer('id_cliente')->lenght(10)->unsigned();
            $table->foreign("id_cliente")->references("id")->on("cliente");
            $table->integer('id_capataz')->lenght(10)->unsigned();
            $table->foreign("id_capataz")->references("id")->on("capataz");
            $table->integer('dias')->lenght(3);
            $table->date('fecha');
            $table->date('reincorporacion');
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
        Schema::dropIfExists('sanciones');
    }
}
