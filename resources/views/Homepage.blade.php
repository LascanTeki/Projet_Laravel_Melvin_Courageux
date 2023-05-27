@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
@endsection

@section('content')
    <div class="content">
        <div id="Main">
            <div class="filters">Welcome to LaraDrink</div>

            <div class="categories">
                @foreach ($categories as $category)
                    <a href="/list?cat={{ $category['strCategory'] }}">
                        <div class="category">{{ $category['strCategory'] }}</div>
                    </a>
                @endforeach
            </div>

        </div>
        <div id="Banner">
            <div class="filters">Suggestions</div>

            @foreach ($randoms as $random)
                <a class="drinks" href="/drink?drink={{ $random['strDrink'] }}">
                    <div class="drink">{{ $random['strDrink'] }}</div>
                    <img src="{{ $random['strDrinkThumb'] }}" alt='{{ $random['strDrink'] }}' class="back" />
                </a>
            @endforeach


        </div>
    </div>
@endsection
