<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('order_code')->unique();
            $table->string('status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('shipping_method')->nullable();
            $table->unsignedBigInteger('sub_total_price')->nullable()->default(0);
            $table->unsignedBigInteger('shipping_price')->nullable()->default(0);
            $table->unsignedBigInteger('taxes')->nullable()->default(0);
            $table->unsignedBigInteger('discount_price')->nullable()->default(0);
            $table->unsignedBigInteger('total_price')->nullable()->default(0);
            $table->text('note')->nullable();
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
};
