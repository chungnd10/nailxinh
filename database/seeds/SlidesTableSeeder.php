<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = [
            [
                'title' => 'DỊCH VỤ LÀM MÓNG',
                'images' => '1572969313slider01.jpg',
                'description' => 'Là dịch vụ được yêu thích nhất tại NAIL ROOM, với những mẫu nail hot trend, luôn đi đầu xu hướng',
                'display_status_id' => 2
            ],
            [
                'title' => 'DỊCH VỤ NỐI MI',
                'images' => '1572969394slider02.jpg',
                'description' => 'Ở Nail Xinh hiện có 2 dịch vụ chính về mi đó là nối mi và uốn mi',
                'display_status_id' => 2
            ],
            [
                'title' => 'ĐIÊU KHẮC LÔNG MÀY',
                'images' => '1572969453slider03.jpg',
                'description' => 'Nail Xinh đang có các dịch vụ về lông mày như: phun thêu, điêu khắc, waxing',
                'display_status_id' => 2
            ]
        ];

        DB::table('slides')->insert($slides);
    }
}
