<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Chưa xác nhận'
            ],
            [
                'name' => 'Đã xác nhận'
            ],
            [
                'name' => 'Đang xử lý'
            ],
            [
                'name' => 'Đã hoàn thành'
            ]
        ];
        DB::table('order_statuses')->insert($status);
    }
}
