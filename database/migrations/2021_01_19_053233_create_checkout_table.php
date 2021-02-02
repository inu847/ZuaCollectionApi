<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('birth');
            $table->string('product_name');
            $table->string('price');
            $table->string('address');
            $table->string('rt');
            $table->string('rw');
            $table->string('phone');
            $table->string('city');
            $table->string('state');
            $table->string('post_code');
            $table->string('country');
            $table->enum('status', ['PENDING', 'DIKIRIM', 'SELESAI']);
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
        Schema::dropIfExists('checkout');
    }
}
