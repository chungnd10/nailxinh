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
                'images' => '1575638796banner-nail.jpg',
                'description' => 'Là dịch vụ được yêu thích nhất tại NAIL ROOM, với những mẫu nail hot trend, luôn đi đầu xu hướng',
                'location_display' => config('contants.location_display_right'),
                'display_status_id' => config('contants.display_status_display')
            ],
            [
                'title' => 'DỊCH VỤ NỐI MI',
                'images' => '1575639441home_banner-1920x845-4.jpg',
                'description' => 'Ở Nail Xinh hiện có 2 dịch vụ chính về mi đó là nối mi và uốn mi',
                'location_display' => config('contants.location_display_left'),
                'display_status_id' => config('contants.display_status_display')
            ],
            [
                'title' => 'ĐIÊU KHẮC LÔNG MÀY',
                'images' => '1575639778banner-nail3.jpg',
                'description' => 'Nail Xinh đang có các dịch vụ về lông mày như: phun thêu, điêu khắc, waxing',
                'location_display' => config('contants.location_display_left'),
                'display_status_id' => config('contants.display_status_display')
            ]
        ];

        DB::table('slides')->insert($slides);
    }
}
