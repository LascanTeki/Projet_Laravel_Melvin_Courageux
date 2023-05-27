
<?php

/*if (request('search')) {
        ＄users = User::where('name', 'like', '%' . request('search') . '%')->get();
    } else {
        ＄users = User::all();
    }
*/
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraDrink</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}">

    @yield('style')

</head>

<body class="antialiased">
    <header>
        <a href="/"><img src="{{ asset('img/logo.png') }}" alt='Logo' class="logo"/></a>
        <form method="post" action="">
            <input type="search" class="search" placeholder="Search..." name="search">
        </form>
        <div class="login">
            <a href="/login">Login</a>
            <a href="/signup">Signup</a>
        </div>
    </header>

    @yield('content')

</body>

</html>