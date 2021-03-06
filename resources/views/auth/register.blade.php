

@extends('layouts.auth')

@section('content')
<div class="col-lg-9">
    <div class="p-5">
        <div class="text-center">
            <img src="{{ asset('img/sikapta-logo.png') }}" alt="" class="img-fluids" width="150">
            <h1 class="h4 text-gray-900 my-4">Registrasi Akun Sikapta Unsiq</h1>
        </div>
        <form class="user" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group">
                
                    <input id="nim" type="nim" placeholder="Your Nim" class="form-control form-control-user {{ $errors->has('nim') ? ' has-error' : '' }}" name="nim" value="{{ old('nim') }}" autofocus>

                    @if ($errors->has('nim'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('nim') }}</strong>
                        </div>
                       
                    @endif
                
            </div>
    
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                
                    <input id="email" type="email" placeholder="Enter Email Address..." class="form-control form-control-user" name="email" value="{{ old('email') }}" autofocus>

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
            <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                <input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control form-control-user" name="password_confirmation">                
            </div>


            <button type="submit" class="btn btn-primary btn-user btn-block">
                Register
            </button>
            
        </form>
        
        <div class="text-center">
            Sudah punya akun?
            <a class="link mt-3" href="{{ route('login') }}"> Login di sini.</a>
        </div>
    </div>
</div>


@endsection