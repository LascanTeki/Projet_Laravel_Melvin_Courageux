@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('content')
    <div class="container" id="Main">
        <form method="POST" action="{{ route('register') }}">
            @csrf


            <label for="name" >{{ __('Name') }}</label>


            <input id="name" type="text"  @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror




            <label for="email" >{{ __('Email Address') }}</label>


            <input id="email" type="email"  @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror




            <label for="password" >{{ __('Password') }}</label>


            <input id="password" type="password"  @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror




            <label for="password-confirm">{{ __('Confirm Password') }}</label>


            <input id="password-confirm" type="password"  name="password_confirmation" required
                autocomplete="new-password">



            <button type="submit" class="btn btn-primary submit">
                {{ __('Register') }}
            </button>

        </form>
    </div>
@endsection
