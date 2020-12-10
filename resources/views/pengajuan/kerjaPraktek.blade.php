@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      
         {{-- notifikasi sukses --}}
        @if ($msg = Session::get('msg'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $msg }}</strong>
        </div>
        @endif


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pengajuan Kerja Praktek</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('pengajuan.kpSubmit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}

                        <div class="form-group">
                            <label for="judul" class="col-md-4 control-label">Judul</label>

                            <div class="col-md-6">
                                <input 
                                    id="judul" 
                                    type="text" 
                                    class="form-control {{ $errors->has('judul') ? ' is-invalid' : '' }}" name="judul" 
                                    value="{{ old('judul') }}">

                                @if ($errors->has('judul'))
                                    <div class="invalid-feedback ml-1">
                                        <strong> {{ $errors->first('judul') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bidang_pekerjaan" class="col-md-4 control-label">Bidang Pekerjaan</label>

                            <div class="col-md-6">
                                <input id="bidang_pekerjaan" type="text" 
                                    class="form-control {{ $errors->has('bidang_pekerjaan') ? ' is-invalid' : '' }}" 
                                    name="bidang_pekerjaan" 
                                    value="{{ old('bidang_pekerjaan') }}" 
                                    autofocus>

                                @if ($errors->has('bidang_pekerjaan'))
                                    <span class="invalid-feedback ml-1">
                                        <strong>{{ $errors->first('bidang_pekerjaan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>

                            <div class="col-md-6">
                            <textarea 
                                name="deskripsi" 
                                class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" 
                                id="validationTextarea" 
                                value="{{ old('deskripsi') }}" >
                            </textarea>

                            @if ($errors->has('deskripsi'))
                                <span class="invalid-feedback ml-1">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jml_pegawai" class="col-md-4 control-label">Jumlah Pegawai</label>

                            <div class="col-md-6">
                                <input 
                                id="jml_pegawai"
                                type="number" 
                                class="form-control {{ $errors->has('jml_pegawai') ? ' is-invalid' : '' }}" 
                                name="jml_pegawai" 
                                value="{{ old('jml_pegawai') }}">

                            @if ($errors->has('jml_pegawai'))
                                <span class="invalid-feedback ml-1">
                                    <strong>{{ $errors->first('jml_pegawai') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="kompleksitas_pekerjaan" class="col-md-4 control-label">kompleksitas Pekerjaan</label>

                            <div class="col-md-6">
                                <input 
                                id="kompleksitas_pekerjaan" 
                                type="text" 
                                class="form-control {{ $errors->has('kompleksitas_pekerjaan') ? ' is-invalid' : '' }}" 
                                name="kompleksitas_pekerjaan" 
                                value="{{ old('kompleksitas_pekerjaan') }}">

                                @if ($errors->has('kompleksitas_pekerjaan'))
                                    <span class="invalid-feedback ml-1">
                                        <strong>{{ $errors->first('kompleksitas_pekerjaan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lokasi" class="col-md-4 control-label">Lokasi</label>

                            <div class="col-md-6">
                                <input id="lokasi" 
                                type="text" 
                                class="form-control{{ $errors->has('lokasi') ? ' is-invalid' : '' }}" 
                                name="lokasi" 
                                value="{{ old('lokasi') }}">

                                @if ($errors->has('lokasi'))
                                    <span class="invalid-feedback ml-1">
                                        <strong>{{ $errors->first('lokasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nm_instansi" class="col-md-4 control-label">Nama Instansi</label>

                            <div class="col-md-6">
                                <input 
                                id="nm_instansi" 
                                type="text" 
                                class="form-control {{ $errors->has('nm_instansi') ? ' is-invalid' : '' }}" 
                                name="nm_instansi" 
                                value="{{ old('nm_instansi') }}">

                                @if ($errors->has('nm_instansi'))
                                    <span class="invalid-feedback ml-1">
                                        <strong>{{ $errors->first('nm_instansi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">No Telp Instansi</label>

                            <div class="col-md-6">
                                <input id="phone" 
                                type="text" 
                                class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                                name="phone" 
                                value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback ml-1">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kerangka_pikir" class="col-md-4 control-label">kerangka Pikir</label>

                            <div class="col-md-6">
                                <input id="kerangka_pikir" 
                                type="file" 
                                class="form-control{{ $errors->has('kerangka_pikir') ? ' is-invalid' : '' }}" 
                                name="kerangka_pikir">

                                @if ($errors->has('kerangka_pikir'))
                                    <span class="invalid-feedback ml-1">
                                        <strong>{{ $errors->first('kerangka_pikir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajukan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
