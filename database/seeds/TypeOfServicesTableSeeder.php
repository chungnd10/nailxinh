<?php

use Illuminate\Database\Seeder;

class TypeOfServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_of_servicecs = [
            [
                'name' => 'Nail',
                'slug' => 'nail',
                'image' => '15747482461572970623-nails.jpg',
                'description' => 'Là dịch vụ được yêu thích nhất tại Nail Xinh, với những mẫu nail độc đáo'
            ],
            [
                'name' => 'Mi',
                'slug' => 'mi',
                'image' => '1574748121285006-uon-mi-my-trang-salon-body-1.jpg',
                'description' => 'Ở Nail Xinh hiện có 2 dịch vụ chính về mi đó là nối mi và uốn mi'
            ],
            [
                'name' => 'Lông mày',
                'slug' => 'long-may',
                'image' => '1574748162long may copy.jpg',
                'description' => 'Nail Xinh đang có các dịch vụ về lông mày như: phun thêu, điêu khắc, waxing'
            ],
            [
                'name' => 'Môi',
                'slug' => 'moi',
                'image' => '1574748106phun-moi-pha-le-sau-bao-lau-thi-duoc-danh-son-tro-lai-2.jpg',
                'description' => 'Nail Xinh hiện có 2 dịch vụ về môi đó là phun môi collagen và phun môi tráng thâm'
            ]
        ];

        DB::table('type_of_services')->insert($type_of_servicecs);
    }
}
