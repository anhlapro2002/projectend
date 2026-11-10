<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['id' => 1, 'name' => 'Hà Nội', 'type' => 'Thành phố', 'isDeleted' => 0],
            ['id' => 2, 'name' => 'Hồ Chí Minh', 'type' => 'Thành phố', 'isDeleted' => 0],
            ['id' => 3, 'name' => 'Đà Nẵng', 'type' => 'Thành phố', 'isDeleted' => 0],
            ['id' => 4, 'name' => 'Hải Phòng', 'type' => 'Thành phố', 'isDeleted' => 0],
            ['id' => 5, 'name' => 'Cần Thơ', 'type' => 'Thành phố', 'isDeleted' => 0],
            ['id' => 6, 'name' => 'Thừa Thiên Huế', 'type' => 'Tỉnh', 'isDeleted' => 0],
        ];

        DB::table('provinces')->insert($provinces);
    }
}
