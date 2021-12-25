<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('amount');
            $table->string('status');
            $table->string('transaction_id');
            $table->string('currency');
            $table->string('address');
            $table->bigInteger('process_status')->default(0);
            $table->string('delivery_date')->nullable();
            $table->bigInteger('invoice_number')->nullable();
            $table->bigInteger('notify')->default('0');
            $table->string('type');
            $table->string('delivery')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
