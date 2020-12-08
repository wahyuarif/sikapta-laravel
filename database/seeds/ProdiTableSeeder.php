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
        Prodi::create([
            'prodi' => 'Teknik Informatika',
            'kode_prodi' => 'TI'
        ]);
    }
}
