<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->string('supplier_identification')->unique();
            $table->string('supplier_name_company')->unique();
            $table->string('supplier_name');
            $table->string('supplier_address')->nullable();
            $table->string('supplier_phone');
            $table->string('supplier_phone_alternative')->nullable();
            $table->string('supplier_email')->nullable();

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
        Schema::dropIfExists('suppliers');
    }
}
