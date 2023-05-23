@extends('layouts.layout')


@section('style')
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
@endsection

@section('content')
    <div class="content">
        <div id="Main">
            <div class="filters">Welcome to LaraDrink</div>
        </div>
        <div id="Banner"></div>
    </div>
@endsection
