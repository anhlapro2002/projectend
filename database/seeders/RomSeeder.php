<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RomSeeder extends Seeder
{
    public function run()
    {
        $roms = [
            ['id' => 1, 'name' => 'SSD 256GB', 'isDeleted' => 0],
            ['id' => 2, 'name' => 'SSD 512GB', 'isDeleted' => 0],
            ['id' => 3, 'name' => 'SSD 1TB', 'isDeleted' => 0],
            ['id' => 4, 'name' => 'HDD 1TB', 'isDeleted' => 0],
            ['id' => 5, 'name' => 'SSD 2TB', 'isDeleted' => 0],
        ];

        DB::table('rom')->insert($roms);
    }
}
