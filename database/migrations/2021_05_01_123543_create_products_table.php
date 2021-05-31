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
            $table->string('productuid');
            $table->integer('vendor_id');
            $table->integer('category_id');
            $table->integer('main_category_id');
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->decimal('price',20,2)->nullable();
            $table->decimal('discount',20,2)->nullable();
            $table->decimal('discount_price',20,2)->nullable();
            $table->string('default_image');
            $table->longtext('description');
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
