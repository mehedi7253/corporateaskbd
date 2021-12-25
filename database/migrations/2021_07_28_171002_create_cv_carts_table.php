<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->bigInteger('cv_service_id')->nullable();
            $table->string('invoice_number');
            $table->string('update_year')->nullable();
            $table->bigInteger('experience')->nullable();
            $table->bigInteger('status')->default(0);
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
        Schema::dropIfExists('cv_carts');
    }
}
