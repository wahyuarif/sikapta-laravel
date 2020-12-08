<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    //
    protected $fillable = [
        'kd_bimbingan',
        'pengajuan_id',
        'mahasiswa_id',
        'dosen_id',
        'bab',
        'bahasan',
        'tgl_bimbingan',
        'status'
    ];
}
