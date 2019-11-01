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
                'image' => 'type_of_services_default.png',
                'description' => 'Là dịch vụ được yêu thích nhất tại Nail Xinh, với những mẫu nail'
            ],
            [
                'name' => 'Mi',
                'slug' => 'mi',
                'image' => 'type_of_services_default.png',
                'description' => 'Ở Nail Xinh hiện có 2 dịch vụ chính về mi đó là nối mi và uốn mi'
            ],
            [
                'name' => 'Lông mày',
                'slug' => 'long-may',
                'image' => 'type_of_services_default.png',
                'description' => 'Nail Xinh đang có các dịch vụ về lông mày như: phun thêu, điêu khắc, waxing'
            ]
        ];

        DB::table('type_of_services')->insert($type_of_servicecs);
    }
}
