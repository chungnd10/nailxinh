<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Chăm sóc móng',
                'slug'=> 'cham-soc-mong',
                'description' => 'Hơn 300 màu sơn Hàn Quốc đa dạng và chất lượng. Hàng trăm mẫu đá, hạt, charm trang 
                trí hot nhất hiện nay.',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 1,
                'image' => '1573045031service04.png'
            ],
            [
                'name' => 'Chà gót chân',
                'slug' => 'cha-got-chan',
                'description' => '70 - 80k',
                'price' => 80000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 1,
                'image' => '1573045047service06.png'
            ],
            [
                'name' => 'Nối mi',
                'slug' => 'noi-mi',
                'description' => 'tùy độ dày cộng thêm 10k - 50k',
                'price' => 200000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2,
                'image' => '1573045057service07.png'
            ],
            [
                'name' => 'Uốn mi',
                'slug' => 'uon-mi',
                'description' => 'Uốn mi Collagen 3D',
                'price' => 200000,
                'completion_time' => '40 phút',
                'type_of_services_id' => 2,
                'image' => '1573045065service08.png'
            ],
            [
                'name' => 'Combo uốn mi + wax mày',
                'slug' => 'combo-uon-mi',
                'description' => '',
                'price' => 350000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2,
                'image' => '1573045075service05.png'
            ],
            [
                'name' => 'Dặm lại mi ',
                'slug' => 'dam-lai-mi',
                'description' => '',
                'price' => 150000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '1573045092service02.png'
            ],
            [
                'name' => 'Nhuộm mi',
                'slug' => 'nhuom-mi',
                'description' => 'Nhuộm mi cùng uốn mi phụ thu thêm: 150.000',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '1573045100service01.png'
            ],
            [
                'name' => 'Tháo mi',
                'slug' => 'thao-mi',
                'description' => '',
                'price' => 50000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '1573045137portfolio07.png'
            ],
            [
                'name' => 'Wax lông mày',
                'slug' => 'wax-long-may',
                'description' => '',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 3,
                'image' => '1573045151portfolio06.png'
            ],
            [
                'name' => 'Điêu khắc lông mày ',
                'slug' => 'dieu-khac-long-may',
                'description' => '',
                'price' => 2000000,
                'completion_time' => '1 giờ 30 phút',
                'type_of_services_id' => 3,
                'image' => '1573045160portfolio08.png'
            ],
            [
                'name' => 'Phun lông mày ',
                'slug' => 'phun-long-may',
                'description' => '',
                'price' => 2150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3,
                'image' => '1573045215instagram02.jpg'
            ],
            [
                'name' => 'Phun mí - Eyeliner spray',
                'slug' => 'phun-mi',
                'description' => '',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3,
                'image' => '1573045198instagram03.jpg'
            ]

        ];

        DB::table('services')->insert($services);
    }
}
