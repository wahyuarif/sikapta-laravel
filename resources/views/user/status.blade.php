@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajuans as $pengajuan)
                        <tr>
                            <th scope="row">-</th>
                            <td> {{ $pengajuan->mahasiswa->nim }} </td>
                            <td> {{ $pengajuan->mahasiswa->nama }} </td>
                            <td> {{ $pengajuan->mahasiswa->prodi->prodi }} </td>
                            <td> 
                                <span class="badge badge-primary">
                                    {{ $pengajuan->status }} 
                                </span>
                            </td>
                            <td> 
                                <a href="{{ route('pengajuan.show', ['id' => $pengajuan->id]) }}" class="btn btn-success btn-sm">Lihat Pengajuan</a> 
                                @if($pengajuan->status == 'Ditolak')
                                 <a href="{{ route('pengajuan.kerjaPraktek') }}" class="btn btn-primary btn-sm">Ajukan Kembali</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
