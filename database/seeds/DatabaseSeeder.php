<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BillStatusTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(BranchesTableSeeder::class);
         $this->call(DisplayStatusTableSeeder::class);
         $this->call(GendersTableSeeder::class);
         $this->call(OperationStatusTableSeeder::class);
         $this->call(OrdersStatusTableSeeder::class);
         $this->call(TypeOfServicesTableSeeder::class);
         $this->call(ProcessOfServicesTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(RolesPermissionsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(SlidesTableSeeder::class);
         $this->call(ServicesTableSeeder::class);
         $this->call(IntroductionTableSeeder::class);
         $this->call(MembershipTypeTableSeeder::class);
         $this->call(WebSettingTableSeeder::class);
    }
}
