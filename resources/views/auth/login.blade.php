@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="p-5">
            <div class="text-center">
                <img src="{{ asset('img/sikapta-logo.png') }}" alt="" class="img-fluids" width="150">
                <h1 class="h4 text-gray-900 my-4">Selamat Datang di Sikapta Unsiq</h1>
            </div>
            <form class="user" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    
                        <input id="email" type="text" placeholder="Masukan Alamat Email" class="form-control form-control-user" name="email" value="{{ old('email') }}" autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="text-danger ml-3 mt-2">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                 
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    
                        <input id="password" type="password" placeholder="Password" class="form-control form-control-user" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="text-danger ml-3">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                
                </div>


                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
                
            </form>
            <div class="text-center mt-3">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <hr>
            <div class="text-center">
                Jika belum memiliki akun SIKAPTA, silahkan melakukan registrasi akun SIKAPTA.
                <a class="link" href="{{ route('register') }}"> Daftar di sini.</a>
            </div>
        </div>
    </div>
@endsection