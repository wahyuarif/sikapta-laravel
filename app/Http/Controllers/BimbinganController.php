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
        $this->middleware('auth:dosen')->only(['indexDosen']);
        $this->middleware('auth:web')->only(['indexMahasiswa']);
        
    }

    public function indexMahasiswa()
    {
        $id = Auth::user()->mahasiswa_id;

        $data['bimbingans'] =  Bimbingan::where([
            'mahasiswa_id'=> $id,
            ])->get();
        return view('bimbingan.index', $data);
    }

    public function indexDosen()
    {
        $dosen_id = Auth::user()->id;

        $data['bimbingans'] = Bimbingan::where('dosen_id', $dosen_id)->get();
        // dd($dosen_id);
        // dd($data['bimbingans']);
        return view('bimbingan.indexDosen', $data);
    }

    public function uploadBab(Request $request, $id)
    {
        Bimbingan::update([
            'file_bab' => $request->file_name
        ]);       
    }
}
