<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch_id = 1;
        $users = [
    		[
	            'full_name' => 'Super Admin',
	            'email' => 'admin@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_admin'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654321',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_male'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_hide'),
                'avatar' => 'avatar-default.png'
            ],
    		[
	            'full_name' => 'Ngô Thu Phương',
	            'email' => 'phuongnt@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_manager'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654322',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_female'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_hide'),
                'avatar' => 'avatar-default.png'
            ],
    		[
	            'full_name' => 'Nguyễn Đức Chung',
	            'email' => 'chungnd@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_technician'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654323',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_male'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_display'),
                'avatar' => '1573049781beauticians03.jpg'
            ],
    		[
	            'full_name' => 'Đào Uyên',
	            'email' => 'uyendt@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_technician'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654324',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_female'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_display'),
                'avatar' => '1573049602beauticians01.jpg'
            ],
    		[
	            'full_name' => 'Nguyễn Nhật Hảo',
	            'email' => 'haonn@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_technician'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654325',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_female'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_display'),
                'avatar' => '1573049757beauticians02.jpg'
            ],
            [
	            'full_name' => 'Nguyễn Thị Bích Ngọc',
	            'email' => 'ngocntb@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_technician'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654326',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_female'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_display'),
                'avatar' => '1573049886beauticians04.jpg'
            ],
    		[
	            'full_name' => 'Nguyễn Phương Anh',
	            'email' => 'anhnp@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_cashier'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654327',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_female'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_hide'),
                'avatar' => 'avatar-default.png'
            ],
    		[
	            'full_name' => 'Bùi Thị Ánh',
	            'email' => 'anhbt@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => config('contants.role_receptionist'),
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654328',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => $branch_id,
                'gender_id' => config('contants.gender_female'),
                'operation_status_id' => config('contants.operation_status_active'),
                'display_status_id' => config('contants.display_status_hide'),
                'avatar' => 'avatar-default.png'
            ]

    	];
        DB::table('users')->insert($users);
    }
}
