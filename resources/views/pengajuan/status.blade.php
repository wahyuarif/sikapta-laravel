@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <h4>Pengajuan Kerja Praktek</h4>
        <hr>
    </div>
</div>

@if($ditolak >= 1)

<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Pengajuan anda ditolak oleh kaprodi</h4>
  <p>
      
  </p>                 
  <hr>
    <a href="{{ route('pengajuan.kerjaPraktekSecond') }}" class="btn btn-primary btn-sm">Pengajuan Kembali</a>
    </a>
  
</div>
@endif

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            @foreach($pengajuans as $pengajuan)
            <div class="card-body">
                <h5> {{$pengajuan->judul}} </h5>
                <hr>
                <table width="100%" class="table">
                    <tr>
                        <td>No Pengajuan</td>
                        <td>:</td>
                        <td>{{ $pengajuan->no_pengajuan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Instansi</td>
                        <td>:</td>
                        <td>{{ $pengajuan->nm_instansi }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <span class="badge badge-{{ ($pengajuan->status == 'Ditolak') ? 'danger' : 'primary' }}">
                                {{ $pengajuan->status }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Detail</a>
                        </td>      
                        
                    </tr>
                </table>
                <hr>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection