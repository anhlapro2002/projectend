<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $districts = [
            ['id' => 1, 'name' => 'Ba Đình', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 1],
            ['id' => 2, 'name' => 'Hoàn Kiếm', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 1],
            ['id' => 3, 'name' => 'Cầu Giấy', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 1],
            ['id' => 4, 'name' => 'Bình Thạnh', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 2],
            ['id' => 5, 'name' => 'Thủ Đức', 'type' => 'Thành phố', 'isDeleted' => 0, 'ProId' => 2],
            ['id' => 6, 'name' => 'Gò Vấp', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 2],
            ['id' => 7, 'name' => 'Hải Châu', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 3],
            ['id' => 8, 'name' => 'Ngũ Hành Sơn', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 3],
            ['id' => 9, 'name' => 'Lê Chân', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 4],
            ['id' => 10, 'name' => 'Ninh Kiều', 'type' => 'Quận', 'isDeleted' => 0, 'ProId' => 5],
            ['id' => 11, 'name' => 'Hương Thủy', 'type' => 'Thị xã', 'isDeleted' => 0, 'ProId' => 6],
        ];

        DB::table('districts')->insert($districts);
    }
}
