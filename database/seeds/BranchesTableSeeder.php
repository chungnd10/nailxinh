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
                'address'   => 'Quận Hà Đông, TP Hà Nội',
                'city_id' => 24
            ],
            [
                'name' => '86 Nguyễn Trãi',
                'phone_number'  => '0987654322',
                'address'   => 'Quận Thanh Xuân, TP Hà Nội',
                'city_id' => 24
            ],
            [
                'name' => '216 Cầu Giấy',
                'phone_number'  => '0987654323',
                'address'   => 'Quận Cầu Giấy , TP Hà Nội',
                'city_id' => 24
            ],
            [
                'name' => '21A Lê Lợi, P. Thạch Thang',
                'phone_number'  => '0987654324',
                'address'   => 'Quận Hải Châu, TP Đà Nẵng',
                'city_id' => 15
            ],
            [
                'name' => '517 Quang Trung',
                'phone_number'  => '0987654325',
                'address'   => ' Quận Thanh Khê, TP Đà Nẵng',
                'city_id' => 15
            ],
            [
                'name' => '539B Nguyễn Thị Thập',
                'phone_number'  => '0987654326',
                'address'   => 'Quận Vĩnh Trung, TP Đà Nẵng',
                'city_id' => 15
            ],
            [
                'name' => '182 Lê Lai, P. Bến Thành',
                'phone_number'  => '0987654327',
                'address'   => 'Quận 1, TP HCM',
                'city_id' => 60
            ],
            [
                'name' => '01 Trần Minh Quyền, P. 10',
                'phone_number'  => '0987654328',
                'address'   => 'Quận 10, TP HCM',
                'city_id' => 60
            ],
            [
                'name' => '202 Lê Văn Sỹ, P. 10',
                'phone_number'  => '0987654329',
                'address'   => 'Quận Phú Nhuận, TP HCM',
                'city_id' => 60
            ]
        ];

        DB::table('branches')->insert($branches);
    }
}
