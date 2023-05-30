@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/fav.css') }}">
@endsection

@section('content')
    <div class="content">
        <div id="Main">

            <div class="title">Favorites</div>

            @if ($likes == null)
                <div class="none">It looks like you don't have any favorites yet...</div>
            @else

                @foreach ($likes as $like)
                <a class="drinks" href="/drink?drink={{ $like['strDrink'] }}">
                    <div class="drink">{{ $like['strDrink'] }}</div>
                    <img src="{{ $like['strDrinkThumb'] }}" alt='{{ $like['strDrink'] }}' class="back" />
                </a>
                @endforeach
            @endif

        </div>
    </div>
@endsection
