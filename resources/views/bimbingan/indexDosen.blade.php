@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
         @if ($errors->has('file'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
          </span>
          @endif
      
          {{-- notifikasi sukses --}}
          @if ($msg = Session::get('msg'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $msg }}</strong>
          </div>
          @endif

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data SKS Mahasiswa</div>

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
                    @foreach($bimbingans as $bimbingan)
                        <tr>
                            <th scope="row">-</th>
                            <td> {{ $bimbingan->mahasiswa->nama }} </td>
                            <td> {{ $bimbingan->bab }} </td>
                            <td> {{ $bimbingan->bab }} </td>
                            <td> 
                                <span class="badge badge-primary">
                                    {{ $bimbingan->status }} 
                                </span>
                            </td>
                            <td> 
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endsection