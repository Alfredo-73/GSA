<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenombrarFkClienteEmpresaSancionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*  Schema::table('sanciones', function (Blueprint $table) {
            //
            $table->renameColumn('id_cliente', 'id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa');

        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanciones', function (Blueprint $table) {
            //
        });
    }
}
