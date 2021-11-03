<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->integer('purchases_supplier_id');
            $table->integer('purchases_user_id');
            $table->string('purchases_reference_number')->unique();
            $table->date('purchases_date_purchase')->nullable();
            $table->string('purchases_document')->nullable();
            $table->integer('purchases_tax')->nullable();
            $table->integer('purchases_discount')->nullable();
            $table->float('purchases_total')->nullable();
            $table->float('purchases_grand_total')->nullable();
            $table->enum('purchases_status',['pending','requested','received'])->default('pending');
            $table->text('purchases_additional_notes')->nullable();

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
        Schema::dropIfExists('purchases');
    }
}
