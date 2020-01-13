<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkQuincenaOtra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('control', function (Blueprint $table) {

            $table->biginteger('quincena_id')->lenght(20)->unsigned()->change();
            $table->foreign('quincena_id')->references('id')->on('quincena');
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
        //
    }
}
