<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsDetailSeeder extends Seeder
{
    public function run()
    {
        $details = [
            ['id' => 1, 'price' => 2999, 'quantity' => 10, 'PrdId' => 1, 'RamId' => 5, 'RomId' => 2, 'CpuId' => 7, 'GpuId' => 1],
            ['id' => 2, 'price' => 1599, 'quantity' => 15, 'PrdId' => 2, 'RamId' => 2, 'RomId' => 1, 'CpuId' => 1, 'GpuId' => 1],
            ['id' => 3, 'price' => 2199, 'quantity' => 12, 'PrdId' => 3, 'RamId' => 5, 'RomId' => 2, 'CpuId' => 2, 'GpuId' => 2],
            ['id' => 4, 'price' => 899, 'quantity' => 20, 'PrdId' => 4, 'RamId' => 2, 'RomId' => 1, 'CpuId' => 4, 'GpuId' => 5],
            ['id' => 5, 'price' => 1299, 'quantity' => 18, 'PrdId' => 5, 'RamId' => 3, 'RomId' => 2, 'CpuId' => 1, 'GpuId' => 2],
            ['id' => 6, 'price' => 2499, 'quantity' => 8, 'PrdId' => 6, 'RamId' => 6, 'RomId' => 3, 'CpuId' => 5, 'GpuId' => 3],
            ['id' => 7, 'price' => 1799, 'quantity' => 14, 'PrdId' => 7, 'RamId' => 5, 'RomId' => 2, 'CpuId' => 2, 'GpuId' => 2],
            ['id' => 8, 'price' => 2299, 'quantity' => 9, 'PrdId' => 8, 'RamId' => 5, 'RomId' => 3, 'CpuId' => 2, 'GpuId' => 1],
            ['id' => 9, 'price' => 1199, 'quantity' => 22, 'PrdId' => 9, 'RamId' => 2, 'RomId' => 2, 'CpuId' => 1, 'GpuId' => 1],
        ];

        DB::table('productsdetails')->insert($details);
    }
}
