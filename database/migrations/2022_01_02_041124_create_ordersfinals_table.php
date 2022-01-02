<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersfinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordersfinals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('experience');
            $table->string('purchase_type');
            $table->string('meta');
            $table->float('price');
            $table->string('status');
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
        Schema::dropIfExists('ordersfinals');
    }
}
