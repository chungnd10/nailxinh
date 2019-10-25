<?php

use Illuminate\Database\Seeder;

class ProcessOfServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $process = [
            [
                'name' => 'VỆ SINH MÓNG VÀ NHẶT DA',
                'step' => 1,
                'content' => 'Khách hàng sẽ ngâm tay và được các chuyên viên vệ sinh sạch sẽ. Sau đó, các chuyên sẽ sẽ 
                nhặt sạch da chết xung quanh móng',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'TẠO FORM MÓNG',
                'step' => 2,
                'content' => 'Khách hàng lựa chọn form móng yêu thích và các chuyên viên sẽ dũa móng để tạo được form 
                chuẩn',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'SƠN MỘT LỚP NỀN (SƠN BASE)',
                'step' => 3,
                'content' => 'Chuyên viên sẽ sơn một lớp nền lên móng. Sau đó, móng sẽ được hong khô dưới đèn 
                khoảng 20s - 30s',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'SƠN GEL, TẠO KIỂU',
                'step' => 4,
                'content' => 'Khách hàng sẽ lựa chọn dòng gel và mẫu nail theo mong muốn. Các chuyên viên sẽ design 
                theo mẫu của khách hàng',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'SƠN BÓNG GEL ( SƠN GEL TOP NONE CLEANER)',
                'step' => 5,
                'content' => 'Sau khi đã làm xong bộ nail ưng ý, chuyên viên sẽ sơn một lớp sơn top giúp móng trở nên 
                bóng và bảo vệ móng bền hơn',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'DƯỠNG VIỀN MÓNG',
                'step' => 6,
                'content' => 'Bước cuối cùng, chuyên viên sẽ dưỡng viền móng để tránh việc da bị khô sau khi làm móng',
                'type_of_services_id' => 1
            ],
            [
                'name' => 'VỆ SINH MẮT',
                'step' => 1,
                'content' => 'Chuyên viên sẽ nhỏ thuốc mắt và tẩy trang cho mắt (nếu có)',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'THỰC HIỆN THAO TÁC',
                'step' => 2,
                'content' => 'Sau khi lựa chọn dáng mi và dịch vụ các chuyên viên sẽ thực hiện các thao tác làm mi',
                'type_of_services_id' => 2
            ],
            [
                'name' => 'HOÀN THÀNH',
                'step' => 3,
                'content' => 'Sau khi thực hiện, các chuyên viên sẽ chải lại mi để mi vào nếp hơn.',
                'type_of_services_id' => 2
            ],[
                'name' => 'TƯ VẤN KHÁCH HÀNG',
                'step' => 1,
                'content' => 'Các chuyên viên của NAIL ROOM sẽ tư vấn kiểu dáng và màu sắc chân mày phù hợp nhất dựa vào
                khuôn mặt, độ tuổi, màu da của mỗi khách hàng',
                'type_of_services_id' => 3
            ],
            [
                'name' => 'VỆ SINH LÔNG MÀY, SÁT KHUẨN',
                'step' => 2,
                'content' => 'Vệ sinh lông mày giúp đảm bảo an toàn để chuyên viên có thể thực hiện các thao tác về sau',
                'type_of_services_id' => 3
            ],
            [
                'name' => 'VẼ DÁNG CHÂN MÀY DỰA TRÊN THƯỚC ĐO “TỶ LỆ VÀNG”',
                'step' => 3,
                'content' => 'Chuyên viên sử dụng thước đo để phác thảo dáng lông mày hài hoà. Khi khách hàng đã ưng ý 
                với hàng chân mày phác thảo, các chuyên viên mới bắt đầu thực hiện.',
                'type_of_services_id' => 3
            ],
            [
                'name' => 'TIẾN HÀNH THỰC HIỆN',
                'step' => 4,
                'content' => 'Các chuyên viên sẽ tiến hành thực hiện các thao tác làm lông mày mà khách hàng đã lựa 
                chọn như: điêu khắc, phun thêu, waxing….',
                'type_of_services_id' => 3
            ]
        ];

        DB::table('process_of_services')->insert($process);
    }
}
