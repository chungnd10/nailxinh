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
                'name' => 'Chăm sóc móng (Nail care)',
                'description' => 'Hơn 300 màu sơn Hàn Quốc đa dạng và chất lượng. Hàng trăm mẫu đá, hạt, charm trang 
                trí hot nhất hiện nay.',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'Chà gót chân',
                'description' => '70 - 80k',
                'price' => 80000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'Nối mi (Eyelashes extension)',
                'description' => 'tùy độ dày cộng thêm 10k - 50k',
                'price' => 200000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'Uốn mi (Eyelashes curling)',
                'description' => 'Uốn mi Collagen 3D',
                'price' => 200000,
                'completion_time' => '40 phút',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'Combo uốn mi + wax mày',
                'description' => '',
                'price' => 350000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'Dặm lại mi (Eyelashes retouch)',
                'description' => '',
                'price' => 150000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'Nhuộm mi',
                'description' => 'Nhuộm mi cùng uốn mi phụ thu thêm: 150.000',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'Tháo mi (remove eyelashes)',
                'description' => '',
                'price' => 50000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'Wax lông mày',
                'description' => '',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 3
            ],
            [
                'name' => 'Điêu khắc lông mày (Microblading eyebrows)',
                'description' => '',
                'price' => 2000000,
                'completion_time' => '1 giờ 30 phút',
                'type_of_services_id' => 3
            ],
            [
                'name' => 'Phun lông mày (Eyebrow spray)',
                'description' => '',
                'price' => 2150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3
            ],
            [
                'name' => 'Phun mí - Eyeliner spray',
                'description' => '',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3
            ]

        ];

        DB::table('services')->insert($services);
    }
}
