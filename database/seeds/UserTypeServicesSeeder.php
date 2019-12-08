<?php

use Illuminate\Database\Seeder;

class UserTypeServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_services = [
            [ 'user_id'  => 3, 'type_of_service_id'  => 1 ],
            [ 'user_id'  => 4, 'type_of_service_id'  => 4 ],
            [ 'user_id'  => 5, 'type_of_service_id'  => 3 ],
            [ 'user_id'  => 6, 'type_of_service_id'  => 2 ]
        ];

        DB::table('user_type_services')->insert($type_services);
    }
}
