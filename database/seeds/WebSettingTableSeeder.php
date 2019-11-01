<?php

use Illuminate\Database\Seeder;

class WebSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $web_settings = [
            [
                'open_time' => '08:00',
                'close_time' => '20:00',
                'phone_number' => '0987654321',
                'email' => 'nailxinh@gmail.com',
                'logo' => 'logo.png'
            ]
        ];
        DB::table('web_settings')->insert($web_settings);
    }
}
