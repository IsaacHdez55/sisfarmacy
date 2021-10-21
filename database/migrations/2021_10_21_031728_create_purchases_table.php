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

            $table->integer('purchases_proveedor_id');
            $table->integer('purchases_user_id');
            $table->string('purchases_reference_number')->unique();
            $table->dateTime('purchases_date_purchase')->nulleable();
            $table->string('purchases_document')->nulleable();
            $table->decimal('purchases_tax')->nulleable();
            $table->decimal('purchases_total')->nulleable();
            $table->enum('purchases_status',['received','pending','requested'])->default('requested');
            $table->text('purchases_additional_notes')->nulleable();

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
