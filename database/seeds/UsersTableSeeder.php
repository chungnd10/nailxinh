<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
    		[
	            'full_name' => 'Super Admin',
	            'email' => 'admin@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => 1,
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654321',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => 1,
                'gender_id' => 1,
                'operation_status_id' => 1
            ],
    		[
	            'full_name' => 'Nguyễn Đức Chung',
	            'email' => 'chungnd@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => 2,
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654322',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => 1,
                'gender_id' => 1,
                'operation_status_id' => 1
            ],
    		[
	            'full_name' => 'Đào Thị Uyên',
	            'email' => 'uyendt@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => 3,
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654323',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => 1,
                'gender_id' => 1,
                'operation_status_id' => 1
            ],
    		[
	            'full_name' => 'Nguyễn Thị Bích Ngọc',
	            'email' => 'ngocntb@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => 4,
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654324',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => 1,
                'gender_id' => 1,
                'operation_status_id' => 1
            ],
    		[
	            'full_name' => 'Nguyễn Nhật Hảo',
	            'email' => 'haonn@localhost.com',
	            'password' => bcrypt('123456'),
                'role_id'   => 5,
                'birthday'  =>  '1990-10-25',
                'phone_number'  => '0987654325',
                'address'   =>  '216 Cầu Giấy',
                'branch_id' => 1,
                'gender_id' => 1,
                'operation_status_id' => 1
            ]

    	];
        DB::table('users')->insert($users);
    }
}
