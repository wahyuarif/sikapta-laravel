@extends('layouts.dosen')

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
                            
                            @if($bimbingan->status == 'Bimbingan')
                                <a 
                                href="{{ route('bimbingan.terima', ['id' => $bimbingan->id ]) }}" 
                                class="btn btn-success"
                                >
                                Terima
                            </a>
                            <a href="" class="btn btn-primary">Revisi</a>
                            @endif
                        

                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
