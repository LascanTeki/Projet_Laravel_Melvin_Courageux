@extends('layouts.layout')


@section('style')
<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('content')
    <div class="content">
        <div id="Main">
            
            <div class="title">Login</div>
            <form method="post" action="index.php?action=add">
            <label for="Username">Username</label><br>
            <input type="text" id="Username" name="Username"><br>
            <label for="Password">Password</label><br>
            <input type="text" id="Password" name="Password"><br>
            <input type="submit" value="Submit" name="submit" class="submit">
            </form>
        </div>
    </div>
    @endsection
