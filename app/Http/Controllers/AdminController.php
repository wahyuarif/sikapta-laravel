<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// wahyu
use App\Mahasiswa;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;
// end wahyu
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    //tambahan
    // public function tes(){
    //     $mhs = Mahasiswa::all();
    //     return $mhs;
    // }
    public function viewDataMahasiswa(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $mahasiswa = Mahasiswa::select(['nim', 'nama']);
            return Datatables::of($mahasiswa)->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama']);

        return view('user.mahasiswa')->with(compact('html'));
    }
}

