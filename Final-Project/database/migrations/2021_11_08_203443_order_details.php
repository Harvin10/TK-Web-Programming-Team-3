<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetails extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->integer('subtotal')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
