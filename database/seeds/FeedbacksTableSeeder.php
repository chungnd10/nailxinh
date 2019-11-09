<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [
            [
                'full_name' => 'Hương Nhi',
                'image' => 'feedback1.jpg',
                'display_status_id' => config('contants.display_status_display'),
                'content' => 'Làm naill tại Nail Xinh max xinh mà còn bền kinh khủng. Mình làm một bộ móng mà chơi dài mấy tháng liền, nhân viên lại dễ thương, cute nữa, mãi yêu Nail Xinh.'
            ],
            [
                'full_name' => 'Ngọc Ánh',
                'image' => 'feedback2.jpg',
                'display_status_id' => config('contants.display_status_display'),
                'content' => 'Mình làm móng 3 lần ở NailXinh đều rất hài lòng. Tiệm đẹp, nhân viên nhẹ nhàng, dễ thương, đi đúng giờ hay gặp người nổi tiếng.'
            ],
            [
                'full_name' => 'Thu Phương',
                'image' => 'feedback3.jpg',
                'display_status_id' => config('contants.display_status_display'),
                'content' => 'Trung thành với duy nhất 1 brand làm nail thui nhé. Chưa thấy ở đâu ổn hơn Nail Xinh luôn đó. Chính xác là giá cả và chất lượng đi đôi với nhau. Nhân viên còn đáng iu hết sức. '
            ]

        ];
        DB::table('feedbacks')->insert($feedbacks);
    }
}
