<?php

use App\Sks;
use Illuminate\Database\Seeder;

class SksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sks::truncate();

        $sks1 = 
        [
            'nim' => '2019150080',
            'nama' => 'Ahmad Rifai',
            'jml_sks' => 110
        ];
            
        $sks2 =
        [
            'nim' => '2015150128',
            'nama' => 'Wahyu Arif kurniawan',
            'jml_sks' => 110
        ];
        

        Sks::create($sks1);
        Sks::create($sks2);
    }

}
