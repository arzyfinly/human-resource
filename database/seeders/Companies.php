<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
 
class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Raga',
            'email' => 'raga@gmail.com',
            'Logo' => Hash::make('12345678'),
            'web_url' => 'raga.com',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Lutfi',
            'email' => 'lutfi@gmail.com',
            'Logo' => Hash::make('12345678'),
            'web_url' => 'lutfi.com',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}