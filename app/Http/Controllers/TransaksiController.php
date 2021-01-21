<?php

namespace App\Http\Controllers;
use App\Transaksi;
use Session;
use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Session\Session;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('transaksi.mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $this->validate($request, [
            'jns_pengajuan' => 'required',
            'bukti_pembayaran' => 'required|mimes:jpg,bmp,png',
            'tanggal_bayar' => 'required'
        ]);

        $nim = Auth::user()->mahasiswa->nim;    
        $bukti_pembayaran = $this->_uploadFile($nim, $request->file('bukti_pembayaran'));

        $mhs = Mahasiswa::where('nim', $nim)->first();


        $transaksi = [

            'mahasiswa_id' => $mahasiswaId,
            'jns_pengajuan' => $jns_pengajuan,
            'bukti_pembayaran' => $bukti_pembayaran,
            'tanggal_bayar' => $tanggal_bayar
        ];
        Transaksi::create($transaksi);
        Session::flash('msg', 'Berhasil Ditambah');
        return redirect(route('transaksi.mahasiswa'));

    }
    
    private function _uploadFile($nim, $bukti_pembayaran)
    {

        $nama = $nim.rand(). '.' . $bukti_pembayaran->getClientOriginalExtension();

        $tujuan_upload = 'file_transaksi';

        $kerangkaPikir->move($tujuan_upload, $nama);

        return $nama;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
