<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = [
            ['name' => 'An Giang'],
            ['name' => 'Bà Rịa - Vũng Tàu'],
            ['name' => 'Bắc Giang'],
            ['name' => 'Bắc Kạn'],
            ['name' => 'Bạc Liêu'],
            ['name' => 'Bắc Ninh'],
            ['name' => 'Bến Tre'],
            ['name' => 'Bình Định'],
            ['name' => 'Bình Dương'],
            ['name' => 'Bình Phước'],
            ['name' => 'Bình Thuận'],
            ['name' => 'Cà Mau'],
            ['name' => 'Cần Thơ'],
            ['name' => 'Cao Bằng'],
            ['name' => 'Đà Nẵng'],
            ['name' => 'Đắk Lắk'],
            ['name' => 'Đắk Nông'],
            ['name' => 'Điện Biên'],
            ['name' => 'Đồng Nai'],
            ['name' => 'Đồng Tháp'],
            ['name' => 'Gia Lai'],
            ['name' => 'Hà Giang'],
            ['name' => 'Hà Nam'],
            ['name' => 'Hà Nội'],
            ['name' => 'Hà Tĩnh'],
            ['name' => 'Hải Dương'],
            ['name' => 'Hải Phòng'],
            ['name' => 'Hậu Giang'],
            ['name' => 'Hoà Bình'],
            ['name' => 'Huế'],
            ['name' => 'Hưng Yên'],
            ['name' => 'Khánh Hoà'],
            ['name' => 'Kiên Giang'],
            ['name' => 'Kon Tum'],
            ['name' => 'Lai Châu'],
            ['name' => 'Lâm Đồng'],
            ['name' => 'Lạng Sơn'],
            ['name' => 'Lào Cai'],
            ['name' => 'Long An'],
            ['name' => 'Nam Định'],
            ['name' => 'Nghệ An'],
            ['name' => 'Ninh Bình'],
            ['name' => 'Ninh Thuận'],
            ['name' => 'Phú Thọ'],
            ['name' => 'Phú Yên'],
            ['name' => 'Quảng Bình'],
            ['name' => 'Quảng Nam'],
            ['name' => 'Quảng Ngãi'],
            ['name' => 'Quảng Ninh'],
            ['name' => 'Quảng Trị'],
            ['name' => 'Sóc Trăng'],
            ['name' => 'Sơn La'],
            ['name' => 'Tây Ninh'],
            ['name' => 'Thái Bình'],
            ['name' => 'Thái Nguyên'],
            ['name' => 'Thanh Hoá'],
            ['name' => 'Tiền Giang'],
            ['name' => 'Trà Vinh'],
            ['name' => 'Tuyên Quang'],
            ['name' => 'TP Hồ Chí Minh'],
            ['name' => 'Vĩnh Long'],
            ['name' => 'Vĩnh Phúc'],
            ['name' => 'Yên Bái']
        ];

        DB::table('cities')->insert($city);
    }
}
