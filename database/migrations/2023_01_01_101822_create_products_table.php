<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_thumbnail');
            $table->string('product_background');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('product_name');
            $table->bigInteger('product_stock');
            $table->unsignedBigInteger('product_price');
            $table->longText('description');
            $table->string('isDeleted')->default('false');
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
        Schema::dropIfExists('products');
    }
}
