<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('nombreCliente');
            $table->mediumText('direccion');
            $table->date('fecha');
            $table->mediumText('detalle');
            $table->unsignedInteger('id_carrito');
            $table->foreign('id_carrito')->references('id')->on('carritos');
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
        Schema::dropIfExists('compras');
    }
}
