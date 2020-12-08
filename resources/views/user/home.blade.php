@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

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
