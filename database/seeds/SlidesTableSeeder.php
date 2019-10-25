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
                'title' => 'Tiêu đề',
                'images' => 'slide-default.png',
                'display_status_id' => 1

            ],
            [
                'title' =>'Tiêu đề',
                'images' => 'slide-default.png',
                'display_status_id' => 1

            ],
            [
                'title' => 'Tiêu đề',
                'images' => 'slide-default.png',
                'display_status_id' => 1

            ]
        ];

        DB::table('slides')->insert($slides);
    }
}
