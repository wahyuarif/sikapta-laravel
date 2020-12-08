@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if ($msg = Session::get('msg'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $msg }}</strong>
                </div>
                @endif

                @foreach($bimbingans as $bimbingan)
                    <div class="panel panel-default">
                        <div class="panel-heading"> Bab {{ $bimbingan->bab }} </div>

                        <div class="panel-body">
                            <a href="" class="btn btn-success">Upload Bab {{ $bimbingan->bab }}</a>
                        </div>
                            
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
