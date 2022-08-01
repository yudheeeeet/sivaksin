<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Dinas Kesehatan',
            'email' => 'dinkesjember@gmail.com',
            'password' => bcrypt('DinkesJember123'),
            'roles' => 'dinkes'
        ]);

        $admin = User::create([
            'name' => 'Kepala Koordinator Vaksinasi Kecamatan Semboro',
            'email' => 'kordessemboro@gmail.com',
            'password' => bcrypt('Kordessemboro123'),
            'roles' => 'petugas'
        ]);
    }
}
