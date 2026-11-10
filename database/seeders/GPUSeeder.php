<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GPUSeeder extends Seeder
{
    public function run()
    {
        $gpus = [
            ['id' => 1, 'name' => 'NVIDIA GTX 1650', 'isDeleted' => 0],
            ['id' => 2, 'name' => 'NVIDIA RTX 3050', 'isDeleted' => 0],
            ['id' => 3, 'name' => 'NVIDIA RTX 4060', 'isDeleted' => 0],
            ['id' => 4, 'name' => 'NVIDIA RTX 4070', 'isDeleted' => 0],
            ['id' => 5, 'name' => 'AMD Radeon RX 6600', 'isDeleted' => 0],
            ['id' => 6, 'name' => 'Intel Arc A750', 'isDeleted' => 0],
        ];

        DB::table('gpu')->insert($gpus);
    }
}
