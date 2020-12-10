@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 col-md-offset-2">
                @if ($msg = Session::get('msg'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $msg }}</strong>
                </div>
                @endif

                @foreach($bimbingans as $bimbingan)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bab {{ $bimbingan->bab }} </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Dosen Pembimbing</td>
                                    <td>:</td>
                                    <td>{{ $bimbingan->dosen->nm_dosen }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $bimbingan->dosen->email }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ $bimbingan->status }}</td>
                                </tr>
                            </table>
                            <p>
                                Note: Pilih Upload jika akan melakukan bimbingan secara online atau pilih buat janji untuk bimbingan secara tatap muka
                            </p>
                            <a href="" class="btn btn-success">Upload</a>
                            <a href="" class="btn btn-primary">Buat Jadwal</a>

                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
