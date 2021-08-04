<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
 
class EmployeesSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            'first_name' => 'admin',
            'last_name' => 'azik',
            'company_id' => '1',
            'departement_id' => '1',
            'user_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('employees')->insert([
            'first_name' => 'user',
            'last_name' => 'azik',
            'company_id' => '2',
            'departement_id' => '2',
            'user_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}