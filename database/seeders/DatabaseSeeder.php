<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
 
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DepartementsSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployeesSeeder::class);
    }
}