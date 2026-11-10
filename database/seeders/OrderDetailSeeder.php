<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    public function run()
    {
        $orderIds = DB::table('orders')->pluck('id')->toArray();
        $details = DB::table('productsdetails')->get();

        $rows = [];
        foreach ($orderIds as $orderId) {
            $lines = rand(1, 3);
            for ($i = 0; $i < $lines; $i++) {
                $detail = $details[array_rand($details->toArray())];
                $rows[] = [
                    'OrderID' => $orderId,
                    'PrddID' => $detail->id,
                    'PrdQuantity' => rand(1, 2),
                    'PrdPrice' => $detail->price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        foreach (array_chunk($rows, 200) as $chunk) {
            DB::table('orderdetails')->insert($chunk);
        }
    }
}
