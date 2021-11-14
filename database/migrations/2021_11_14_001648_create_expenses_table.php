<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('expenses_category_id');
            $table->string('reference_number')->unique();
            $table->date('date')->nullable();
            $table->text('total_amount')->nullable();
            $table->string('attachment')->nullable();
            $table->text('expense_note')->nullable();
            $table->enum('purchases_status',['pending','paid'])->default('pending');
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
        Schema::dropIfExists('expenses');
    }
}
