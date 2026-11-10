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
        Schema::create('OrderDetails', function (Blueprint $table) {
            $table->double('PrdPrice');
            $table->double('PrdQuantity');
            $table->foreignId('OrderID')->constrained('Orders');
            $table->foreignId('PrddID')->constrained('ProductsDetails');
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
        Schema::dropIfExists('OrderDetails');
    }
};
