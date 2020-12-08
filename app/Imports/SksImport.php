<?php

namespace App\Imports;

use App\Sks;
use Maatwebsite\Excel\Concerns\ToModel;

class SksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        $jml_sks = 0;

        for ($i=3; $i < 11 ; $i++) { 
            $jml_sks += (int)$row[$i];
        }

        return new Sks([
            'nim' => $row[1],
            'nama' => $row[2],
            'jml_sks' => $jml_sks
        ]);
    }
}
