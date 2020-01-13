<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearFkControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('control', function (Blueprint $table) {
            $table->foreign("id_cliente")->references("id")->on("cliente");

            
        });
        Schema::table('cosecha', function (Blueprint $table) {
            $table->foreign("id_cliente")->references("id")->on("cliente");
            $table->foreign("id_capataz")->references("id")->on("capataz");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        
    }
}
