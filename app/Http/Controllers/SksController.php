<?php

namespace App\Http\Controllers;

use App\Sks;
use App\Imports\SksImport;
use App\Exports\SksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class SksController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data['sks'] = Sks::all();

        return view('sks.index', $data);
    }

    public function exportExcel(){
        return Excel::download(new SksExport, 'sks.xlsx');
    }

    public function importExcel( Request $request ){
        // dd($request);

        $this->validate($request, [
            'file' => 'required|mimes:cvs,xls,xlsx'
        ]);

        $file = $request->file;

        // dd($file);

        // Membuat nama file
        $namaFile = rand().$file->getClientOriginalName();

        $file->move('file_siswa', $namaFile);

        Excel::import(new SksImport, public_path('/file_siswa/' . $namaFile));

        Session::flash('sukses', 'Data SKS berhasil di import');

        return redirect()->back();

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
