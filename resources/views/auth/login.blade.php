@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@endsection


@section('content')
    <div class="container" id="Main">

        <form method="POST" action="{{ route('login') }}">
            @csrf


            <label for="email">{{ __('Email Address') }}</label>


            <input id="email" type="email" @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror



            <label for="password">{{ __('Password') }}</label>


            <input id="password" type="password" @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror





            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>




            <button type="submit" class="btn btn-primary submit" >
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

        </form>


    </div>
@endsection
