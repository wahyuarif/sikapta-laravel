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

        // $mhs1 = [
        //         'nim' => '2019150080',
        //         'nama' => 'Ahmad Rifai',
        //         'no_hp' => '085540449300',
        //         'prodi_id' => 1,
        //         'status' => 'y',
        // ];
        // $mhs2 = [
        //     'nim' => '2015150128',
        //     'nama' => 'Wahyu Arif Kurniawan',
        //     'no_hp' => '08562759112',
        //     'prodi_id' => 1,
        //     'status' => 'y',
        // ];

        // Mahasiswa::create($mhs1);
        // Mahasiswa::create($mhs2);
         if(DB::table('mahasiswas')->get()->count() == 0){

            DB::table('mahasiswas')->insert([

                [
                    'nim' => '2019150080',
                    'nama' => 'Ahmad Rifai',
                    'no_hp' => '085540449300',
                    'prodi_id' => 1,
                    'status' => 'y',
                ],
                [
                    'nim' => '2015150128',
                    'nama' => 'Wahyu Arif Kurniawan',
                    'no_hp' => '08562759112',
                    'prodi_id' => 1,
                    'status' => 'y',
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
