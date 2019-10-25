<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name' => '199 Quang Trung',
                'phone_number'  => '0987654321',
                'address'   => '199 Quang Trung, Quận Hà Đông',
                'city_id' => 24
            ]
        ];

        DB::table('branches')->insert($branches);
    }
}