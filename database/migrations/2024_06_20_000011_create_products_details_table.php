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
        Schema::create('ProductsDetails', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->double('quantity');
            $table->foreignId('PrdId')->constrained('products');
            $table->foreignId('RamId')->constrained('RAM');
            $table->foreignId('RomId')->constrained('ROM');
            $table->foreignId('CpuId')->constrained('CPU');
            $table->foreignId('GpuId')->constrained('GPU');
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
        Schema::dropIfExists('ProductsDetails');
    }
};
