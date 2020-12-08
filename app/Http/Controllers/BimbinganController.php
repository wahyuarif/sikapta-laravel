<?php

namespace App\Http\Controllers;

use App\Bimbingan;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimbinganController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth:dosen');
        // $this->middleware('auth:web')->only(['index']);
    }

    public function indexMahasiswa()
    {
        $nim = Auth::user()->nim;
        $mahasiswaId = Mahasiswa::where('nim', $nim)->first();

        // dd($mahasiswaId['id']);
        // dd($dosenId);

        $data['bimbingans'] =  Bimbingan::where('mahasiswa_id', $mahasiswaId['id'])->get();
        return view('bimbingan.index', $data);
    }
}
