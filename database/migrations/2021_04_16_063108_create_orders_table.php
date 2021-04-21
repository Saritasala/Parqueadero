<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('name');
            $table->string('reference', 500);
            $table->dateTime('date');
            $table->integer('payment_type_vp');
            $table->integer('payment_state');
            $table->double('total');
            $table->string('direccion');
            $table->integer('order_state');
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
