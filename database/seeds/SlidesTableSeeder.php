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
                'title' => 'Banner 1',
                'images' => 'slide-default.png',
                'display_status_id' => 2
            ],
            [
                'title' => 'Baner 2',
                'images' => 'slide-default.png',
                'display_status_id' => 2
            ],
            [
                'title' => 'Banner 3',
                'images' => 'slide-default.png',
                'display_status_id' => 2
            ]
        ];

        DB::table('slides')->insert($slides);
    }
}
