<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisplayStatusTableSeeder extends Seeder
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
                'name ' => 'Ẩn'
            ],
            [
                'name'  => 'Hiện'
            ]
        ];
        DB::table('display_statuses')->insert($status);
    }
}
