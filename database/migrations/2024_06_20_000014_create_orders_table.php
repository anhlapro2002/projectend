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
            $table->integer('Status');
            $table->date('Date');
            $table->string('UserName');
            $table->string('UserEmail');
            $table->string('UserPhone');
            $table->double('TotalAmount');
            $table->string('TrackingNumber');
            $table->string('TransactionReference')->nullable();
            $table->foreignId('UserId')->constrained('user');
            $table->foreignId('PayId')->constrained('Paymentmethods');
            $table->foreignId('ShipId')->constrained('ShippingUnits');
            $table->foreignId('WardId')->constrained('Wards');
            $table->foreignId('DisId')->constrained('districts');
            $table->foreignId('ProId')->constrained('Provinces');
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
