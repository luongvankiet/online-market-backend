<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('product_code')->unique()->nullable();
            $table->string('product_sku')->unique()->nullable();
            $table->unsignedBigInteger('regular_price')->default(0);
            $table->unsignedBigInteger('sale_price')->default(0);
            $table->binary('image')->nullable();
            $table->string('unit')->nullable();
            $table->unsignedBigInteger('quantity')->default(0);
            $table->string('seller_id')->nullable();
            $table->foreignIdFor(Category::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->timestamp('published_at')->nullable();
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
};
