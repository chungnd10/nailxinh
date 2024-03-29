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
                'open_time' => 'Thứ 2 - Thứ 7: 08:00',
                'close_time' => '20:00',
                'phone_number' => '0987654321',
                'address' => '199 Quang Trung, Q.Hà Đông, TP HN',
                'introduction' => 'NAILXINH là một trong số những hệ thống tiệm nail cao cấp ở Hà Nội, được đầu tư hệ thống trang thiết bị hiện đại',
                'email' => 'nailxinh1@gmail.com',
                'logo' => 'logo.png',
                'facebook' => 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FNail-Xinh-111390913633637%2F&tabs&width=255&height=196&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=399404564065453'

            ]
        ];
        DB::table('web_settings')->insert($web_settings);
    }
}
