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
                                    @foreach($bimbingan->revisi as $revisi)
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>{{$revisi->catatan}}</td>
                                    <td>{{$revisi->file_revisi}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>

                            
                            @if($bimbingan->status == 'Bimbingan')
                            <p>
                                Note: Pilih Upload jika akan melakukan bimbingan secara online atau pilih buat janji untuk bimbingan secara tatap muka
                            </p>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{ $bimbingan->bab }}">
                                    Upload File
                                </button></a>
                                <a href="" class="btn btn-primary">Buat Jadwal</a>
                            @endif
                            

                        </div>
                    </div>

                    {{-- modal --}}
                    <div class="modal fade" id="exampleModal{{ $bimbingan->bab }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                @endforeach
            </div>
        </div>
    </div>
@endsection

{{-- modal --}}
