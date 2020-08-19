<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipopagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipopagos', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedFloat('impuesto');
            $table->string('banco');
            $table->unsignedBigInteger('numeroCuenta');
            $table->unsignedBigInteger('carnet');
            $table->unsignedInteger('id_compra');
            $table->foreign('id_compra')->references('id')->on('compras');
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
        Schema::dropIfExists('tipopagos');
    }
}
