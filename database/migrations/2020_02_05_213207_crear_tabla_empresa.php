<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');

            $table->string('razon_social')->lenght(100);
            $table->integer('cuit')->lenght(11);
            $table->string('domicilio')->lenght(150);
            $table->integer('logo');
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
        //
        Schema::dropIfExists('empresa');
    }
}
