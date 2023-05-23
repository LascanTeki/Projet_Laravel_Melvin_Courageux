@extends('layouts.layout')

@section('style')
<link rel="stylesheet" href="{{ URL::asset('css/error.css') }}">
@endsection

@section('content')


<div class="error">This page doesn't exist<a href="/">Go back to Homepage</a></div>


    @endsection