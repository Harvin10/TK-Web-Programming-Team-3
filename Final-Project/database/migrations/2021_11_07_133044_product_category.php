<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCategory extends Migration
{
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
        });
    }
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
