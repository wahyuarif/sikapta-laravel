@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <!-- Default Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Home</h6>
                </div>
                <div class="card-body">
                    Anda Sudah memenuhi Syarat Kerja Praktek 
                    Silahkan Membayar Biaya KP ke rekening xxxx

                    <br>
                    <a href="{{ route('pengajuan.kerjaPraktek') }}" class="btn btn-primary">Skip</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
