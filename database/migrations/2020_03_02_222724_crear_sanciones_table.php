<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearSancionesTable extends Migration
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
            $table->bigInteger('id_empleado')->lenght(20)->unsigned();
            $table->bigInteger('id_capataz')->lenght(20)->unsigned();
            $table->bigInteger('id_empresa')->lenght(20)->unsigned();
            $table->integer('dias')->lenght(11);
            $table->date('fecha');
            $table->date('reincorporacion');
            $table->string('motivo')->lenght(255)->nullable();
            $table->string('observacion')->lenght(255)->nullable();

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
