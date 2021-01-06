<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Admin;
use App\Models\Dosen;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Admin::truncate();
        Dosen::truncate();

        $admin = [
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ];

        $kaprodi = [
            'nik' => '2019123100',
            'nm_dosen' => 'Pak Nahar',
            'Fakultas' => 'Fastikom',
            'prodi_id' => 1,
            'status' => 'active',
            'jabatan' => 'kaprodi',
            'email' => 'kaprodi@mail.com',
            'password' => bcrypt('password')
        ];

        $dosen = [
            'nik' => '201924140912',
            'nm_dosen' => 'Pak Muslim',
            'Fakultas' => 'Fastikom',
            'prodi_id' => 1,
            'status' => 'active',
            'jabatan' => 'dosen',
            'email' => 'dosen@mail.com',
            'password' => bcrypt('password')
        ];

        Admin::insert($admin);
        Dosen::insert($dosen);
        Dosen::insert($kaprodi);
    }
}
