<?php

use Illuminate\Database\Seeder;
use App\Prodi;

class ProdiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Prodi::truncate();
    //     Prodi::create(
    //         [
    //         'prodi' => 'Teknik Informatika',
    //         'kode_prodi' => 'TI'
    //         ],
    //         [
    //             'prodi' => 'Teknik Sipil',
    //             'kode_prodi' => 'TS'
    //         ]
    // );

        if(DB::table('prodis')->get()->count() == 0)
        {

            DB::table('prodis')->insert([

                [
                    'prodi' => 'Teknik Informatika',
                    'kode_prodi' => 'TI'
                ],
                [
                    'prodi' => 'Teknik Sipil',
                    'kode_prodi' => 'TS'
                ],
                [
                    'prodi' => 'Arsitektur',
                    'kode_prodi' => 'AR'
                ],
                [
                    'prodi' => 'Teknik Mesin',
                    'kode_prodi' => 'TM'
                ],
                [
                    'prodi' => 'Management Informatika',
                    'kode_prodi' => 'MI'
                ],

            ]);

        } else 
        { 
            echo "\e[31mTable is not empty, therefore NOT "; 
        }

    }
}
