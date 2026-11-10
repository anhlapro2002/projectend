<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $customers = DB::table('user')->where('role', 2)->get();
        $details = DB::table('productsdetails')->get();
        $payIds = DB::table('paymentmethods')->pluck('id')->toArray();
        $shipIds = DB::table('shippingunits')->pluck('id')->toArray();
        $wardIds = DB::table('wards')->pluck('id')->toArray();
        $disIds = DB::table('districts')->pluck('id')->toArray();
        $proIds = DB::table('provinces')->pluck('id')->toArray();

        $statusPool = [3, 3, 3, 3, 3, 2, 2, 1, 0, 4];

        $orders = [];
        $orderId = 1;
        $now = now();

        // Tạo đơn hàng cho từng tháng từ 01/2025 đến 12/2026
        for ($year = 2025; $year <= 2026; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                $count = rand(5, 9);
                for ($i = 0; $i < $count; $i++) {
                    $day = rand(1, 28);
                    $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                    $datetime = $date . ' ' . sprintf('%02d:%02d:%02d', rand(8, 20), rand(0, 59), rand(0, 59));

                    $customer = $customers[array_rand($customers->toArray())];
                    $detail = $details[array_rand($details->toArray())];
                    $quantity = rand(1, 3);
                    $total = $detail->price * $quantity;

                    $orders[] = [
                        'id' => $orderId,
                        'Status' => $statusPool[array_rand($statusPool)],
                        'Date' => $date,
                        'UserName' => $customer->name,
                        'UserEmail' => $customer->email,
                        'UserPhone' => $customer->phone,
                        'TotalAmount' => $total,
                        'TrackingNumber' => 'EB' . str_pad($orderId, 9, '0', STR_PAD_LEFT) . 'VN',
                        'TransactionReference' => rand(0, 1) ? 'REF' . rand(100000, 999999) : null,
                        'UserId' => $customer->id,
                        'PayId' => $payIds[array_rand($payIds)],
                        'ShipId' => $shipIds[array_rand($shipIds)],
                        'WardId' => $wardIds[array_rand($wardIds)],
                        'DisId' => $disIds[array_rand($disIds)],
                        'ProId' => $proIds[array_rand($proIds)],
                        'created_at' => $datetime,
                        'updated_at' => $datetime,
                    ];
                    $orderId++;
                }
            }
        }

        // Chia nhỏ để tránh giới hạn câu lệnh insert
        foreach (array_chunk($orders, 200) as $chunk) {
            DB::table('orders')->insert($chunk);
        }

        // Lưu chi tiết đơn cho seeder kế tiếp (tạm thời trong bảng tạm không cần)
    }
}
