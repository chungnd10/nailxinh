<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'title' => 'Xem tích điểm',
                'name'  => 'view-accumulate-points'
            ],
            [
                'title' => 'Xóa tích điểm',
                'name'  => 'remove-accumulate-points'
            ],
            [
                'title' => 'Xem slide',
                'name'  => 'view-slide'
            ],
            [
                'title' => 'Thêm slide',
                'name'  => 'add-slide'
            ],
            [
                'title' => 'Sửa slide',
                'name'  => 'edit-slide'
            ],
            [
                'title' => 'Xóa slide',
                'name'  => 'remove-slide'
            ],
            [
                'title' => 'Xem loại thành viên',
                'name'  => 'view-membership-type'
            ],
            [
                'title' => 'Thêm loại thành viên',
                'name'  => 'add-membership-type'
            ],
            [
                'title' => 'Sửa loại thành viên',
                'name'  => 'edit-membership-type'
            ],
            [
                'title' => 'Xóa loại thành viên',
                'name'  => 'remove-membership-type'
            ],
            [
                'title' => 'Xem thông tin website',
                'name'  => 'view-web-settings'
            ],
            [
                'title' => 'Sửa thông tin website',
                'name'  => 'edit-web-settings'
            ],
            [
                'title' => 'Xem phản hồi khách hàng',
                'name'  => 'view-feedback'
            ],
            [
                'title' => 'Thêm phản hồi khách hàng',
                'name'  => 'add-feedback'
            ],
            [
                'title' => 'Sửa phản hồi khách hàng',
                'name'  => 'edit-feedback'
            ],
            [
                'title' => 'Xóa phản hồi khách hàng',
                'name'  => 'remove-feedback'
            ],
            [
                'title' => 'Sửa trang giới thiệu',
                'name'  => 'edit-introductions-page'
            ],
            [
                'title' => 'Xem danh sách hạn chế',
                'name'  => 'view-restricted-lists'
            ],
            [
                'title' => 'Thêm danh sách hạn chế',
                'name'  => 'add-restricted-lists'
            ],
            [
                'title' => 'Xóa danh sách hạn chế',
                'name'  => 'remove-restricted-lists'
            ],
            [
                'title' => 'Xem loại dịch vụ',
                'name'  => 'view-type-of-services'
            ],
            [
                'title' => 'Thêm loại dịch vụ',
                'name'  => 'add-type-of-services'
            ],
            [
                'title' => 'Sửa loại dịch vụ',
                'name'  => 'edit-type-of-services'
            ],
            [
                'title' => 'Xóa loại dịch vụ',
                'name'  => 'remove-type-of-services'
            ],
            [
                'title' => 'Xem dịch vụ',
                'name'  => 'view-services'
            ],
            [
                'title' => 'Thêm dịch vụ',
                'name'  => 'add-services'
            ],
            [
                'title' => 'Sửa dịch vụ',
                'name'  => 'edit-services'
            ],
            [
                'title' => 'Xóa dịch vụ',
                'name'  => 'remove-services'
            ],
            [
                'title' => 'Xem quy trình loại dịch vụ',
                'name'  => 'view-process-of-services'
            ],
            [
                'title' => 'Thêm quy trình loại dịch vụ',
                'name'  => 'add-process-of-services'
            ],
            [
                'title' => 'Sửa quy trình loại dịch vụ',
                'name'  => 'edit-process-of-services'
            ],
            [
                'title' => 'Xóa quy trình loại dịch vụ',
                'name'  => 'remove-process-of-services'
            ],
            [
                'title' => 'Xem chi nhánh',
                'name'  => 'view-branchs'
            ],
            [
                'title' => 'Thêm chi nhánh',
                'name'  => 'add-branchs'
            ],
            [
                'title' => 'Sửa chi nhánh',
                'name'  => 'edit-branchs'
            ],
            [
                'title' => 'Xóa chi nhánh',
                'name'  => 'remove-branchs'
            ],
            [
                'title' => 'Xem hóa đơn',
                'name'  => 'view-bills'
            ],
            [
                'title' => 'Cập nhật hóa đơn',
                'name'  => 'update-bills'
            ],
            [
                'title' => 'In hóa đơn',
                'name'  => 'print-bills'
            ],
            [
                'title' => 'Xem lịch đặt',
                'name'  => 'view-orders'
            ],
            [
                'title' => 'Thêm lịch đặt',
                'name'  => 'add-orders'
            ],
            [
                'title' => 'Cập nhật lịch đặt',
                'name'  => 'update-orders'
            ],
            [
                'title' => 'Xem nhân viên',
                'name'  => 'view-users'
            ],
            [
                'title' => 'Thêm nhân viên',
                'name'  => 'add-users'
            ],
            [
                'title' => 'Sửa nhân viên',
                'name'  => 'edit-users'
            ],
            [
                'title' => 'Xóa nhân viên',
                'name'  => 'remove-users'
            ],
            [
                'title' => 'Phân quyền cho nhân viên',
                'name'  => 'edit-roles'
            ],
            [
                'title' => 'Đặt mật khẩu mới cho nhân viên',
                'name'  => 'set-password'
            ],
            [
                'title' => 'Phân quyền chức năng',
                'name'  => 'set-role'
            ],
            [
                'title' => 'Thay đổi ảnh đại diện',
                'name'  => 'change-image-profile'
            ],
            [
                'title' => 'Xem danh sách đăng ký nhận tin khuyến mãi',
                'name'  => 'view-subscribe'
            ],
            [
                'title' => 'Thêm danh sách đăng ký nhận tin khuyến mãi',
                'name'  => 'add-subscribe'
            ],
            [
                'title' => 'Sửa danh sách đăng ký nhận tin khuyến mãi',
                'name'  => 'edit-subscribe'
            ],
            [
                'title' => 'Xóa danh sách đăng ký nhận tin khuyến mãi',
                'name'  => 'remove-subscribe'
            ],
            [
                'title' => 'Xem thư viện ảnh',
                'name'  => 'view-photo-library'
            ],
            [
                'title' => 'Thêm thư viện ảnh',
                'name'  => 'add-photo-library'
            ],
            [
                'title' => 'Sửa thư viện ảnh',
                'name'  => 'edit-photo-library'
            ],
            [
                'title' => 'Xóa thư viện ảnh',
                'name'  => 'remove-photo-library'
            ],
            [
                'title' => 'Xóa lịch đặt',
                'name'  => 'remove-orders'
            ],
        ];

        DB::table('permissions')->insert($permission);
    }
}
