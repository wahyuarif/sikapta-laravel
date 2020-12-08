<?php

namespace App\Http\Controllers;

use Session;
use App\Bimbingan;
use App\Dosen;
use App\Mahasiswa;
use App\Pengajuan;
use App\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Session\Session;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth:dosen')->except(['kerjaPraktek', 'kpSubmit']);
         $this->middleware('auth:web')->only(['kerjaPraktek', 'kpSubmit']);
     }

    public function index()
    {

        // $this->middleware('auth:dosen');
        $dosenId = Auth::user()->id;

        $dosen = Dosen::where('id',$dosenId)->first();

        // dd($dosen['jabatan']);

        if ($dosen->jabatan == 'kaprodi' OR $dosen->jabatan == 'dekan') {
            
            $data['pengajuans'] =  Pengajuan::where([
                ['dosen_id' ,'=', $dosenId],
                ['selesai' ,'=', 0],
                ['status', '=', 'Pengajuan'],
            ])->get();
    
            // dd($pengajuan);
            return view('pengajuan.index', $data);
        }else{
            return "Page not found";
        }
        
        
    }
    

    public function kerjaPraktek()
    {
        return view('pengajuan.kerjaPraktek');
    }

    public function kpSubmit(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'bidang_pekerjaan' => 'required',
            'deskripsi' => 'required',
            'jml_pegawai' => 'required',
            'kompleksitas_pekerjaan' => 'required',
            'lokasi' => 'required',
            'nm_instansi' => 'required',
            'phone' => 'required',
            'kerangka_pikir' => 'required|mimes:pdf,docs'
        ]);

        // dd($request->file('kerangka_pikir')->getClientOriginalName());
        $nim = Auth::user()->nim;

        $kerangkaPikir = $this->uploadFile($nim, $request->file('kerangka_pikir'));

        // dd($kerangkaPikir);

        $mhs = Mahasiswa::where('nim', $nim)->first();
        $kaprodi = Dosen::where([
            'jabatan' => 'kaprodi', 
            'prodi_id'=> $mhs['prodi_id']
            ])->first();

        // dd($kaprodi);
        $kaprodiId = $kaprodi['id'];
        $mahasiswaId = $mhs['id'];
        

        // dd($kaprodiId);
        // dd($request);
        
        $prodi = Prodi::where('id', $mhs['prodi_id'])->first();
        $kdProdi = $prodi['kode_prodi'];

        $date = getdate();

        $year = $date['year'];
        $mon = $date['mon'];
        $back = Pengajuan::count() + 1;




        $noPengajuan = $kdProdi.'KP'.$mon.$year.'00'.$back;

                

        $pengajuan = [
            'dosen_id' => $kaprodiId,
            'mahasiswa_id' => $mahasiswaId,
            'no_pengajuan' => $noPengajuan,
            'judul' => $request->judul,
            'bidang_pekerjaan' => $request->bidang_pekerjaan,
            'deskripsi' => $request->deskripsi,
            'jml_pegawai' => $request->jml_pegawai,
            'jns_pengajuan' => 'KP',
            'kompleksitas_pekerjaan' => $request->kompleksitas_pekerjaan,
            'lokasi' => $request->lokasi,
            'nm_instansi' => $request->nm_instansi,
            'phone' => $request->phone,
            'kerangka_pikir' => $kerangkaPikir,
            'status' => 'Pengajuan',
            'ket' => null,
            'selesai' => 0
        ];

        Pengajuan::create($pengajuan);

        Session::flash('msg', 'Berhasil Ditambah');

        return redirect(route('home'));
    }

    private function uploadFile($nim, $kerangkaPikir)
    {

        $nama = $nim.rand(). '.' . $kerangkaPikir->getClientOriginalExtension();

        $tujuan_upload = 'file_pengajuan/kerangkapikir';

        $kerangkaPikir->move($tujuan_upload, $nama);

        return $nama;

    }

    public function show($id)
    {

        $data['dosens'] = Dosen::all();
        $data['pengajuan'] = Pengajuan::where('id', $id)->first();
        
        return view('pengajuan.show', $data);
    }

    public function terima($id)
    {
        $pengajuan = Pengajuan::find($id);

        $pengajuan->status = 'Diterima';

        $pengajuan->save();

        Session::flash('msg', 'Pengajuan Berhasil Diterima');

        return redirect(route('pengajuan'));

    }
    public function tolak($id)
    {
        $pengajuan = Pengajuan::find($id);

        $pengajuan->status = 'Ditolak';

        $pengajuan->save();

        Session::flash('msg', 'Pengajuan Berhasil Ditolak');

        return redirect(route('pengajuan'));

    }
    public function terimaSyarat(Request $request, $id)
    {
        $this->validate($request, [
            'syarat' => 'required',
            'dosen_id' => 'required'
        ]);


        $pengajuan = Pengajuan::find($id);
        $pengajuan->syarat = $request->syarat;
        $pengajuan->status = 'Terima Syarat';
        $pengajuan->save();


        $bimbingan = [
            'kd_bimbingan' => rand(),
            'pengajuan_id' => $request->pengajuan_id,
            'dosen_id' => $request->dosen_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'bab' => 1,
            'bahasan' => null,
            'tgl_bimbingan' => null,
            'status' => 'Bimbingan',
        ];

        Bimbingan::create($bimbingan);



        Session::flash('msg', 'Pengajuan Berhasil Diterima');

        return redirect(route('pengajuan'));
    }

}
