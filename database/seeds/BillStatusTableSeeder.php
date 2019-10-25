<?php

use Illuminate\Database\Seeder;

class BillStatusTableSeeder extends Seeder
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
                'name' => 'Chưa thanh toán'
            ],
            [
                'name' => 'Đã thanh toán'
            ]
        ];
        DB::table('bill_statuses')->insert($status);
    }
}
