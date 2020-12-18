@extends('layouts.app')

@section('content')
<div class="row mt-2">
    <div class="col-12">
        <p>Dashborad</p>
        <h4>Selamat Datang, {{ Auth::user()->mahasiswa->nama }}</h4>
        <hr>
    </div>
</div>

<div class="row mt-2">
    <div class="col-sm-3 col-sm-6 mt-3">
        <a href="{{ route('persyaratan') }}" class="btn">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('icon/svg/accept.svg') }}" alt="" class="img-fluid" width="100">
                        </div>
                        <div class="col-6 d-flex-row ">
                        <h4 class="text-left font-weight-bold text-primary">Persyaratan</h4>
                            <p class="text-left">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-sm-6 mt-3">
        <a href="{{ route('pengajuanKP.kerjaPraktek') }}" class="btn">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('icon/svg/creative-idea.svg') }}" alt="" class="img-fluid" width="100">
                        </div>
                        <div class="col-6 d-flex-row ">
                        <h4 class="text-left font-weight-bold text-primary">Kerja Praktek</h4>
                            <p class="text-left">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-sm-6 mt-3">
        <a href="{{ route('bimbingan.mahasiswa') }}" class="btn">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('icon/svg/calendar.svg') }}" alt="" class="img-fluid" width="100">
                        </div>
                        <div class="col-6 d-flex-row ">
                        <h4 class="text-left font-weight-bold text-primary">Bimbingan</h4>
                            <p class="text-left">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-3 col-sm-6 mt-3">
        <a href="{{route('pengajuanTA.tugasAkhir')}}" class="btn">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('icon/svg/database.svg') }}" alt="" class="img-fluid" width="100">
                        </div>
                        <div class="col-6 d-flex-row ">
                        <h4 class="text-left font-weight-bold text-primary">Tugas Akhir</h4>
                            <p class="text-left">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
