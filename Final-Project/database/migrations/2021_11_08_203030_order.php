<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('card_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('expired_month')->nullable();
            $table->string('expired_year')->nullable();
            $table->string('cvv')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
