<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
 
class DepartementsSeeder extends Seeder
{
    public function run()
    {
        DB::table('departements')->insert([
            'name' => 'HRD',
            'description' => 'Merupakan bagian dalam perusahaan atau organisasi yang memiliki tugas untuk mengelola sumber daya manusia dan karyawan. Mulai dari perencanaan, recruitment dan seleksi karyawan baru.',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('departements')->insert([
            'name' => 'Sales & Marketing',
            'description' => 'Marketing merupakan sebuah divisi yang bertanggung jawab atas penjualan dan pemasaran produk yang dihasilkan oleh perusahaan. Departemen ini merupakan salah satu departemen yang sangat penting sekali di dalam perusahaan.',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}