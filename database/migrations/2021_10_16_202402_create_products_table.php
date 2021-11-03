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

            $table->string('product_name')->unique()->nullable();
            $table->integer('product_brand')->nullable();
            $table->integer('product_unit')->nullable();
            $table->integer('product_category')->nullable();
            $table->string('product_code')->unique()->nullable();
            $table->integer('product_stock')->nullable();
            $table->text('product_purchase_price')->nullable();
            $table->text('product_selling_price')->nullable();
            $table->integer('product_sales')->nullable();
            $table->string('product_image')->nullable();
            $table->date('product_expiration')->nullable();
            $table->string('product_rack')->nullable();
            $table->string('product_row')->nullable();
            $table->string('product_position')->nullable();

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
