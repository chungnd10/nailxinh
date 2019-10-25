<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            [
                'name' => 'Nam'
            ],
            [
                'name' => 'Nữ'
            ],
            [
                'name' => 'Khác'
            ]
        ];
        DB::table('genders')->insert($genders);
    }
}
