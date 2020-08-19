<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->unsignedInteger('id',true);
            $table->date('fecha');
            $table->unsignedBigInteger('nit');
            $table->unsignedDouble('monto');
            $table->unsignedInteger('id_recibo');
            $table->foreign('id_recibo')->references('id')->on('recibos');
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
        Schema::dropIfExists('facturas');
    }
}
