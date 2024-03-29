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

            $table->integer('brand_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
            $table->integer('manufacturer_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->double('price');
            $table->double('price_origin');
            $table->double('discount')->nullable();
            $table->double('weight')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('featured');
            $table->tinyInteger('status')->default('0')->comment('1=hidden, 0=visible');
            $table->string('tag')->nullable();

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
