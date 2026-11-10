<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    public function run()
    {
        $wards = [
            // Ba Đình (Hà Nội)
            ['id' => 1, 'name' => 'Phường Trúc Bạch', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 1],
            ['id' => 2, 'name' => 'Phường Phúc Xá', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 1],
            // Hoàn Kiếm (Hà Nội)
            ['id' => 3, 'name' => 'Phường Hàng Bạc', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 2],
            ['id' => 4, 'name' => 'Phường Hàng Bông', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 2],
            // Cầu Giấy (Hà Nội)
            ['id' => 5, 'name' => 'Phường Nghĩa Đô', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 3],
            ['id' => 6, 'name' => 'Phường Mai Dịch', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 3],
            // Bình Thạnh (Hồ Chí Minh)
            ['id' => 7, 'name' => 'Phường 1', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 4],
            ['id' => 8, 'name' => 'Phường 2', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 4],
            // Thủ Đức (Hồ Chí Minh)
            ['id' => 9, 'name' => 'Phường Linh Xuân', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 5],
            ['id' => 10, 'name' => 'Phường Trắng Sao', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 5],
            // Gò Vấp (Hồ Chí Minh)
            ['id' => 11, 'name' => 'Phường 1', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 6],
            ['id' => 12, 'name' => 'Phường 10', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 6],
            // Hải Châu (Đà Nẵng)
            ['id' => 13, 'name' => 'Phường Hải Châu I', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 7],
            ['id' => 14, 'name' => 'Phường Hải Châu II', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 7],
            // Ngũ Hành Sơn (Đà Nẵng)
            ['id' => 15, 'name' => 'Phường Mỹ An', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 8],
            // Lê Chân (Hải Phòng)
            ['id' => 16, 'name' => 'Phường An Biên', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 9],
            // Ninh Kiều (Cần Thơ)
            ['id' => 17, 'name' => 'Phường An Phú', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 10],
            // Thừa Thiên Huế
            ['id' => 18, 'name' => 'Phường Phú Thượng', 'type' => 'Phường', 'isDeleted' => 0, 'DisId' => 11],
        ];

        DB::table('wards')->insert($wards);
    }
}
