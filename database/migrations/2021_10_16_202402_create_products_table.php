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

            $table->string('product_name')->unique()->nulleable();
            $table->integer('product_brand')->nulleable();
            $table->integer('product_unit')->nulleable();
            $table->integer('product_category')->nulleable();
            $table->string('product_code')->unique()->nulleable();
            $table->integer('product_stock')->nulleable();
            $table->double('product_purchase_price')->nulleable();
            $table->double('product_selling_price')->nulleable();
            $table->integer('product_sales')->nulleable();
            $table->string('product_image')->nulleable();
            $table->date('product_expiration')->nulleable();
            $table->string('product_rack')->nulleable();
            $table->string('product_row')->nulleable();
            $table->string('product_position')->nulleable();

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
