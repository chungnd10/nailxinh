<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Active'
            ],
            [
                'name'  => 'Inactive'
            ]
        ];
        DB::table('operation_statuses')->insert($status);
    }
}
