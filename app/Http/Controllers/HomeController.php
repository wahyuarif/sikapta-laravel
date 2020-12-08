<?php

namespace App\Http\Controllers;

use App\Bimbingan;
use App\Mahasiswa;
use App\Pengajuan;
use App\Sks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nim = Auth::user()->nim;
        $mhs = Mahasiswa::where('nim', $nim)->first();
        $sks = Sks::where('nim', $nim)->first();
        $pengajuan = Pengajuan::where('mahasiswa_id', $mhs['id'])->count();
        $data['pengajuans'] = Pengajuan::where('mahasiswa_id', $mhs['id'])->get();
        $terima = Pengajuan::where([
            'mahasiswa_id'=> $mhs['id'],
            'status' => 'Diterima'
        ])->count();

        // dd($mhs['id']);
        
        // dd($terima);
        // dd($pengajuan);

        if ($pengajuan == null) {
            if ( $sks['jml_sks'] >= 20 ) {
                return view('user.home');
            }else{
                return view('user.homeElse');
            }
        }else if ($terima == 1) {

            Session::flash('msg', 'Selamat ,Pengajuan anda telah diterima oleh kaprodi, anda bisa memulai bimbingan kerja praktek');

            return redirect(route('bimbingan.mahasiswa'));
        }else {
            return view('user.status' , $data);        
        }////
    }

    public function tolak()
    {
        return view('user.tolak');
    }
}
