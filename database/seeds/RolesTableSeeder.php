<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Quản lý chi nhánh'
            ],
            [
                'name' => 'Kỹ thuật viên'
            ],
            [
                'name' => 'Thu ngân'
            ] ,
            [
                'name' => 'Nhân viên tiếp đón'
            ]
        ];
        DB::table('roles')->insert($role);
    }
}
