<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaFKControlNuevoFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->foreign('id_factura')->references('id')->on('facturas')->onDelete('set null');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->dropForeign('id_factura');
        });
    }
}
    