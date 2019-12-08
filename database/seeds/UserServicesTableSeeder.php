<?php

use Illuminate\Database\Seeder;

class UserServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [ 'user_id'  => 4, 'service_id'    => 13 ],
            [ 'user_id'  => 4, 'service_id'    => 14 ],
            [ 'user_id'  => 4, 'service_id'    => 15 ],
            [ 'user_id'  => 4, 'service_id'    => 16 ],
            [ 'user_id'  => 5, 'service_id'    => 9  ],
            [ 'user_id'  => 5, 'service_id'    => 10 ],
            [ 'user_id'  => 5, 'service_id'    => 11 ],
            [ 'user_id'  => 5, 'service_id'    => 12 ],
            [ 'user_id'  => 6, 'service_id'    => 3 ],
            [ 'user_id'  => 6, 'service_id'    => 4 ],
            [ 'user_id'  => 6, 'service_id'    => 5 ],
            [ 'user_id'  => 6, 'service_id'    => 6 ],
            [ 'user_id'  => 6, 'service_id'    => 7 ],
            [ 'user_id'  => 6, 'service_id'    => 8 ],
            [ 'user_id'  => 3, 'service_id'    => 1 ],
            [ 'user_id'  => 3, 'service_id'    => 2 ],
        ];

        DB::table('user_services')->insert($services);
    }
}
