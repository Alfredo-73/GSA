<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DesvincularFkClienteSancionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanciones', function (Blueprint $table) {
            //
            $table->renameColumn('id_empresa','id_cliente' );
            $table->dropForeign('sanciones_id_cliente_foreign');
        });
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
