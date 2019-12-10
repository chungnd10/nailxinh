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
                'image' => '125def69b9e2d09.jpg'
            ],
            [
                'name' => 'Chà gót chân',
                'slug' => 'cha-got-chan',
                'description' => '70 - 80k',
                'price' => 80000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 1,
                'image' => '125def6985b3c46.jpg'
            ],
            [
                'name' => 'Nối mi',
                'slug' => 'noi-mi',
                'description' => 'tùy độ dày cộng thêm 10k - 50k',
                'price' => 200000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2,
                'image' => '125def69182d4d5.jpg'
            ],
            [
                'name' => 'Uốn mi',
                'slug' => 'uon-mi',
                'description' => 'Uốn mi Collagen 3D',
                'price' => 200000,
                'completion_time' => '40 phút',
                'type_of_services_id' => 2,
                'image' => '125def68b0e042e.jpg'
            ],
            [
                'name' => 'Combo uốn mi + wax mày',
                'slug' => 'combo-uon-mi',
                'description' => '',
                'price' => 350000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2,
                'image' => '125def68a21e9dd.jpg'
            ],
            [
                'name' => 'Dặm lại mi ',
                'slug' => 'dam-lai-mi',
                'description' => '',
                'price' => 150000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '125def67b1057be.jpg'
            ],
            [
                'name' => 'Nhuộm mi',
                'slug' => 'nhuom-mi',
                'description' => 'Nhuộm mi cùng uốn mi phụ thu thêm: 150.000',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '125def6781d849e.jpg'
            ],
            [
                'name' => 'Tháo mi',
                'slug' => 'thao-mi',
                'description' => '',
                'price' => 50000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '125def674561f29.jpg'
            ],
            [
                'name' => 'Wax lông mày',
                'slug' => 'wax-long-may',
                'description' => '',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 3,
                'image' => '125def6709c3ff7.jpg'
            ],
            [
                'name' => 'Điêu khắc lông mày ',
                'slug' => 'dieu-khac-long-may',
                'description' => '',
                'price' => 2000000,
                'completion_time' => '1 giờ 30 phút',
                'type_of_services_id' => 3,
                'image' => '125def66c287926.jpg'
            ],
            [
                'name' => 'Phun lông mày ',
                'slug' => 'phun-long-may',
                'description' => '',
                'price' => 2150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3,
                'image' => '125def669724656.jpg'
            ],
            [
                'name' => 'Phun mí - Eyeliner spray',
                'slug' => 'phun-mi',
                'description' => '',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3,
                'image' => '125def6684bae84.jpg'
            ],
            [
                'name' => 'Phun môi 3D',
                'slug' => 'phun-moi-3d',
                'description' => 'Phù hợp với những trường hợp có môi thâm hay màu môi kém tươi.',
                'price' => 500000,
                'completion_time' => '2 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65f400701.jpg'
            ],
            [
                'name' => 'Phun môi Pha lê',
                'slug' => 'phun-moi-pha-le',
                'description' => 'Sử dụng tinh chất collagen tự nhiên',
                'price' => 1200000,
                'completion_time' => '2 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65e46edd8.jpg'
            ],
            [
                'name' => 'Phun môi Collagen',
                'slug' => 'phun-moi-collagen',
                'description' => 'Độ bền 3-5 năm',
                'price' => 1500000.,
                'completion_time' => '2 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65d63f0ee.jpg'
            ],
            [
                'name' => 'Phun môi thế bào gốc',
                'slug' => 'phun-moi-the-bao-goc',
                'description' => 'Không đau, không sưng tấy',
                'price' => 2000000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65c476cf0.jpg'
            ]

        ];

        DB::table('services')->insert($services);
    }
}
