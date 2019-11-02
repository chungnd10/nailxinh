<?php

use Illuminate\Database\Seeder;

class MembershipTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership_type = [
            [
                'title' => 'VIP',
                'money_level' => '10000000',
                'discount_level' => '15'
            ],
            [
                'title' => 'Premium',
                'money_level' => '5000000',
                'discount_level' => '10'
            ],
            [
                'title' => 'Gold',
                'money_level' => '1000000',
                'discount_level' => '5'
            ],
            [
                'title' => 'Normal',
                'money_level' => '500000',
                'discount_level' => '0'
            ]
        ];
        DB::table('membership_type')->insert($membership_type);
    }
}
