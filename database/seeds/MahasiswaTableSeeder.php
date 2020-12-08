<?php

use App\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Mahasiswa::truncate();

        $mhs = [
            'nim' => '2019150080',
            'nama' => 'Ahmad Rifai',
            'no_hp' => '085540449300',
            'prodi_id' => 1,
            'status' => 'y',

        ];

        Mahasiswa::create($mhs);

    }
}
