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
        'revisi_id',
        'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
