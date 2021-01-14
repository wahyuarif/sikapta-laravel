@extends('layouts.app')

@section('content')

@if($selesai >= 1 AND count($bimbingans) == 0)

<div class="alert alert-primary mt-3" role="alert">
  <h4 class="alert-heading">Bimbingan Tugas Akhir</h4>
  <p>
    Bimbingan Kerja Praktek Anda Sudah Selesai, selahkan lanjut ke Tugas 
    Akhir
  </p>                 
  <hr>
    <a href="{{ route('pengajuanTA.formPengajuan') }}" class="btn btn-primary btn-sm">Cetak Lembar Bimbingan</a>
    </a>
    <a href="{{ route('pengajuanTA.formPengajuan') }}" class="btn btn-primary btn-sm">Pengajuan TA</a>
    </a>
  
</div>

@endif



    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 col-md-offset-2">
                @if ($msg = Session::get('msg'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $msg }}</strong>
                </div>
                @endif
                @if ($errors->has('file_upload'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $errors->first('file_upload') }}</strong>
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

                            <h4 class="bold">Revisi</h4>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Document Revisi</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($bimbingan->revisi as $index=>$revisi)
                              
                                  <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{($revisi->catatan)}}</td>
                                    <td>{{$revisi->file_revisi}}</td>
                                  </tr>
                                  
                                @endforeach
                                </tbody>
                              </table>

                            
                            @if($bimbingan->status == 'Bimbingan' AND $bimbingan->file_bimbingan == null)
                            <p>
                                Note: Pilih Upload jika akan melakukan bimbingan secara online atau pilih buat janji untuk bimbingan secara tatap muka
                            </p>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#upload{{ $bimbingan->bab }}">
                                    Upload File
                                </button></a>
                               
                            @endif

                            @if (count($bimbingan->revisi) > 0 AND $bimbingan->status == 'Revisi')
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadRevisi{{ $bimbingan->bab }}">
                                Upload Revisi
                            </button></a>
                            @endif
                            

                        </div>
                    </div>
                    {{-- Modal Upload --}}
                    <div class="modal fade" id="upload{{ $bimbingan->bab }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload Bab {{ $bimbingan->bab }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ route('bimbingan.uploadBab', ['id' => $bimbingan->id]) }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="custom-file">
                                    <input type="file" name="file_upload" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                        
                                

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    {{-- modal revisi --}}
                    <div class="modal fade" id="uploadRevisi{{ $bimbingan->bab }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload Revisi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ route('bimbingan.uploadRevisi', ['id' => $bimbingan->id]) }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="custom-file">
                                    <input type="file" name="file_upload" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                        
                                

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

{{-- modal --}}
