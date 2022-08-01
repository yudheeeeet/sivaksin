<?php

namespace Database\Seeders;

    use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Kepala Kecamatan Semboro',
            'email' => 'pemdasemboro@gmail.com',
            'password' => bcrypt('PemdaSemboroJember123'),
            'roles' => 'Admin'
        ]);
    }
}
