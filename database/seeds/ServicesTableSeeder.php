<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Chăm sóc móng',
                'slug'=> 'cham-soc-mong',
                'description' => 'Hơn 300 màu sơn Hàn Quốc đa dạng và chất lượng. Hàng trăm mẫu đá, hạt, charm trang 
                trí hot nhất hiện nay.',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 1,
                'image' => '125def69b9e2d09.jpg'
            ],
            [
                'name' => 'Chà gót chân',
                'slug' => 'cha-got-chan',
                'description' => '70 - 80k',
                'price' => 80000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 1,
                'image' => '125def6985b3c46.jpg'
            ],
            [
                'name' => 'Nối mi',
                'slug' => 'noi-mi',
                'description' => 'tùy độ dày cộng thêm 10k - 50k',
                'price' => 200000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2,
                'image' => '125def69182d4d5.jpg'
            ],
            [
                'name' => 'Uốn mi',
                'slug' => 'uon-mi',
                'description' => 'Uốn mi Collagen 3D',
                'price' => 200000,
                'completion_time' => '40 phút',
                'type_of_services_id' => 2,
                'image' => '125def68b0e042e.jpg'
            ],
            [
                'name' => 'Combo uốn mi + wax mày',
                'slug' => 'combo-uon-mi',
                'description' => 'Sợi mi mềm, được làm từ các thành phần thiên nhiên, không gây kích ứng với mắt. Sợi mi giữ được độ cong hoàn hảo từ 2-4 tháng.',
                'price' => 350000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 2,
                'image' => '125def68a21e9dd.jpg'
            ],
            [
                'name' => 'Dặm lại mi ',
                'slug' => 'dam-lai-mi',
                'description' => 'Cách làm rụng mi nối là một trong những kiến thức cơ bản cần nắm đặc biệt với những bạn yêu thích việc nối mi giả.',
                'price' => 150000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '125def67b1057be.jpg'
            ],
            [
                'name' => 'Nhuộm mi',
                'slug' => 'nhuom-mi',
                'description' => 'Nhuộm mi cùng uốn mi phụ thu thêm: 150.000',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '125def6781d849e.jpg'
            ],
            [
                'name' => 'Tháo mi',
                'slug' => 'thao-mi',
                'description' => 'Cách làm rụng mi nối là một trong những kiến thức cơ bản cần nắm đặc biệt với những bạn yêu thích việc nối mi giả.',
                'price' => 50000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 2,
                'image' => '125def674561f29.jpg'
            ],
            [
                'name' => 'Wax lông mày',
                'slug' => 'wax-long-may',
                'description' => 'Một cặp lông mày đẹp giúp khuôn mặt của bạn trở nên rạng rỡ, ấn tượng và ưa nhìn hơn ngay cả khi bạn không trang điểm, nhưng không phải ai cũng may mắn sở hữu một đôi lông mày hoàn hảo.',
                'price' => 200000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 3,
                'image' => '125def6709c3ff7.jpg'
            ],
            [
                'name' => 'Điêu khắc lông mày ',
                'slug' => 'dieu-khac-long-may',
                'description' => 'Là kỹ thuật tiên tiến nhất hiện nay giúp phái đẹp có hàng chân mày tự nhiên đến hoàn hảo giống đến 99%, đan xen theo sợi lông mày thật để khắc sợi vào những chỗ chân mày bị thưa tạo cảm giác tư nhiên, cuống hút và vô cùng ấn tượng.',
                'price' => 2000000,
                'completion_time' => '1 giờ 30 phút',
                'type_of_services_id' => 3,
                'image' => '125def66c287926.jpg'
            ],
            [
                'name' => 'Phun lông mày ',
                'slug' => 'phun-long-may',
                'description' => 'Thường dành cho khách hàng có dáng lông mày, nhưng lông nhạt màu, không rõ. Những màu sắc tự nhiên tạo cho khách hàng một đôi lông mày đậm nét, tạo điểm nhấn cho khuôn mặt thêm hoàn hảo.',
                'price' => 2150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3,
                'image' => '125def669724656.jpg'
            ],
            [
                'name' => 'Phun mí - Eyeliner spray',
                'slug' => 'phun-mi',
                'description' => 'Phun xăm mí mắt là giải pháp tuyệt vời giúp cho phái đẹp mau chóng sở hữu một đôi mắt sắc nét, có hồn, tạo điểm nhấn ấn tượng cho tổng thể khuôn mặt. Phù hợp với người có mắt nhỏ, mắt một mí.',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 3,
                'image' => '125def6684bae84.jpg'
            ],
            [
                'name' => 'Phun môi 3D',
                'slug' => 'phun-moi-3d',
                'description' => 'Phù hợp với những trường hợp có môi thâm hay màu môi kém tươi.',
                'price' => 500000,
                'completion_time' => '2 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65f400701.jpg'
            ],
            [
                'name' => 'Phun môi Pha lê',
                'slug' => 'phun-moi-pha-le',
                'description' => 'Sử dụng tinh chất collagen tự nhiên',
                'price' => 1200000,
                'completion_time' => '2 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65e46edd8.jpg'
            ],
            [
                'name' => 'Phun môi Collagen',
                'slug' => 'phun-moi-collagen',
                'description' => 'Độ bền 3-5 năm',
                'price' => 1500000.,
                'completion_time' => '2 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65d63f0ee.jpg'
            ],
            [
                'name' => 'Phun môi thế bào gốc',
                'slug' => 'phun-moi-the-bao-goc',
                'description' => 'Không đau, không sưng tấy',
                'price' => 2000000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 4,
                'image' => '125def65c476cf0.jpg'
            ],
            [
                'name' => 'Đắp móng gel',
                'slug' => 'dap-mong-gel',
                'description' => 'Đắp móng gel là kỹ thuật hiện đại và được ưa chuộng nhất hiện nay vì móng mỏng và bóng, hơn nữa không cần sơn, cứ để trắng tự nhiên mà nét đẹp vẫn rõ ràng.',
                'price' => 100000,
                'completion_time' => '30 phút',
                'type_of_services_id' => 1,
                'image' => '125df4ae67d638a.jpg'
            ],
            [
                'name' => 'Đắp móng bột',
                'slug' => 'dap-mong-bot',
                'description' => 'Đắp móng bột sẽ thích hợp với những người có bề mặt móng tay và móng chân không phẳng, bị nứt đầu móng hay móng bị hư, bầm tím.',
                'price' => 200000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 1,
                'image' => '125df4addcbd57e.jpg'
            ],
            [
                'name' => 'Combo vẽ móng',
                'slug' => 'combo-ve-mong',
                'description' => 'Giữ được 2 tuần - 1 tháng, màu lên sáng chuẩn bền đẹp, nhiều kiểu mẫu đa dạng thoải mái lựa chọn.',
                'price' => 150000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 1,
                'image' => '125df4ac88c54fb.jpg'
            ],
            [
                'name' => 'Đắp móng lụa',
                'slug' => 'dap-mong-lua',
                'description' => 'Đắp móng lụa sẽ thích hợp với các loại móng tay yếu, dễ gãy. Đây là cách nối dài các móng tay bị gãy bằng móng giả. Móng lụa khi hoàn tất có ưu điểm trông rất tự nhiên, bóng đẹp, chắc chắn nhưng phải dùng sơn màu để xóa vết nối.',
                'price' => 350000,
                'completion_time' => '1 giờ',
                'type_of_services_id' => 1,
                'image' => '125df4a31bb0c36.jpg'
            ]

        ];

        DB::table('services')->insert($services);
    }
}
