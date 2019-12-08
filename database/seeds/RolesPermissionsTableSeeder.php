<?php

use Illuminate\Database\Seeder;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_permission = [
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 1
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 18
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 19
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 20
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 36
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 37
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 38
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 39
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 40
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 41
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 42
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 43
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 44
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 45
            ],
            [
                'role_id' => config('contants.role_manager'),
                'permission_id' => 46
            ],
            [
                'role_id' => config('contants.role_technician'),
                'permission_id' => 40
            ],
            [
                'role_id' => config('contants.role_technician'),
                'permission_id' => 41
            ],
            [
                'role_id' => config('contants.role_technician'),
                'permission_id' => 42
            ],
            [
                'role_id' => config('contants.role_cashier'),
                'permission_id' => 37
            ],
            [
                'role_id' => config('contants.role_cashier'),
                'permission_id' => 38
            ],
            [
                'role_id' => config('contants.role_cashier'),
                'permission_id' => 39
            ],
            [
                'role_id' => config('contants.role_cashier'),
                'permission_id' => 40
            ],
            [
                'role_id' => config('contants.role_receptionist'),
                'permission_id' => 40
            ],
            [
                'role_id' => config('contants.role_receptionist'),
                'permission_id' => 18
            ],
            [
                'role_id' => config('contants.role_receptionist'),
                'permission_id' => 19
            ]
        ];

        DB::table('role_permission')->insert($role_permission);
    }
}
