<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
 
class CompaniesSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Shopee',
            'email' => 'support@shopee.co.id',
            'Logo' => '',
            'web_url' => 'http://www.shopee.co.id',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('companies')->insert([
            'name' => 'Tokopedia',
            'email' => 'speakers@tokopedia.com',
            'Logo' => '',
            'web_url' => 'http://www.tokopedia.com',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}