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

                        
                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-4 control-label">Judul</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>

                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bidang_pekerjaan') ? ' has-error' : '' }}">
                            <label for="bidang_pekerjaan" class="col-md-4 control-label">Bidang Pekerjaan</label>

                            <div class="col-md-6">
                                <input id="bidang_pekerjaan" type="text" class="form-control" name="bidang_pekerjaan" value="{{ old('bidang_pekerjaan') }}" required autofocus>

                                @if ($errors->has('bidang_pekerjaan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bidang_pekerjaan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>

                            <div class="col-md-6">
                            <textarea name="deskripsi" class="form-control is-invalid" id="validationTextarea" required value="{{ old('deskripsi') }}" ></textarea>

                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jml_pegawai') ? ' has-error' : '' }}">
                            <label for="jml_pegawai" class="col-md-4 control-label">Jumlah Pegawai</label>

                            <div class="col-md-6">
                                <input id="jml_pegawai" type="number" class="form-control" name="jml_pegawai" value="{{ old('jml_pegawai') }}" required>

                                @if ($errors->has('jml_pegawai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jml_pegawai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('kompleksitas_pekerjaan') ? ' has-error' : '' }}">
                            <label for="kompleksitas_pekerjaan" class="col-md-4 control-label">kompleksitas Pekerjaan</label>

                            <div class="col-md-6">
                                <input id="kompleksitas_pekerjaan" type="text" class="form-control" name="kompleksitas_pekerjaan" value="{{ old('kompleksitas_pekerjaan') }}" required>

                                @if ($errors->has('kompleksitas-pekerjaan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kompleksitas_pekerjaan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi" class="col-md-4 control-label">Lokasi</label>

                            <div class="col-md-6">
                                <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ old('lokasi') }}" required>

                                @if ($errors->has('lokasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lokasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nm_instansi') ? ' has-error' : '' }}">
                            <label for="nm_instansi" class="col-md-4 control-label">Nama Instansi</label>

                            <div class="col-md-6">
                                <input id="nm_instansi" type="text" class="form-control" name="nm_instansi" value="{{ old('nm_instansi') }}" required>

                                @if ($errors->has('nm_instansi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_instansi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">No Telp Instansi</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kerangka_pikir') ? ' has-error' : '' }}">
                            <label for="kerangka_pikir" class="col-md-4 control-label">kerangka Pikir</label>

                            <div class="col-md-6">
                                <input id="kerangka_pikir" type="file" class="form-control" name="kerangka_pikir" required>

                                @if ($errors->has('kerangka_pikir'))
                                    <span class="help-block">
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
