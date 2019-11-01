<?php

use Illuminate\Database\Seeder;

class IntroductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $introduction = [
            [
                'title' => 'VỚI NAIL XINH “AI CŨNG CÓ THỂ TRỞ NÊN ĐẸP HƠN”',
                'content' =>'Sở hữu các dịch vụ từ làm nail, spa, waxing, phun thêu lông mày, nối mi,… và một không gian cửa hàng yên tĩnh, long lanh dành riêng cho phái đẹp khiến Nail Xinh trở thành điểm đến yêu thích của hơn 100.000 khách hàng trong nước.
                 Với đội ngũ chuyên viên tài năng, dễ thương cùng hệ thống máy móc, dụng cụ nhập từ Hàn Quốc, 5 cơ sở của NAIL  XINH chắc chắn sẽ đem lại những xu hướng làm đẹp mới nhất đến khách hàng',
                'image' =>'img-default.png'
            ]
        ];
        DB::table('introductions')->insert($introduction);
    }
}
