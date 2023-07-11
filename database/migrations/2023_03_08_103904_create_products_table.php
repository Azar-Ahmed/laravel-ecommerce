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
            $table->string('product_name')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('sub_cat_id')->nullable();
            $table->string('color_id')->nullable();
            $table->string('size_id')->nullable();
            $table->string('brand_id')->nullable();

            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();

            $table->string('qty')->nullable();
            $table->text('features')->nullable();
            $table->string('mrp')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();

            $table->string('cover_image')->nullable();
            $table->string('sku')->nullable();
            $table->string('featured_product')->nullable();
            $table->string('deal_of_the_day')->nullable();
            
            $table->string('slug')->nullable();
            $table->integer('status')->default(1);
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
