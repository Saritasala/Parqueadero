<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('clientes_id');
            $table->string('placa', 6);
            $table->string('modelo', 500);
            $table->string('color');
            $table->date('fecha_entrada');
            $table->time('hora');
            $table->date('fecha_salida');
            $table->time('hora_salida');
            $table->string('puesto');
            $table->integer('state')->default(1);
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
