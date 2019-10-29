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
	            'full_name' => 'Admin',
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
	            'full_name' => 'Chủ tiệm',
	            'email' => 'chutiem@localhost.com',
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
	            'full_name' => 'Kỹ thuật viên',
	            'email' => 'kythuatvien@localhost.com',
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
	            'full_name' => 'Thu ngân 1',
	            'email' => 'thungan1@localhost.com',
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
	            'full_name' => 'Nhân viên tiếp đón',
	            'email' => 'nhanvientiepdon@localhost.com',
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
