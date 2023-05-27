@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/drink.css') }}">
@endsection

@section('content')
    <div class="content">
        <div id="Main">
            <div class="title">{{ $drink['strDrink'] }}</div>
            <div class="desc">
                <div class="text">

                    <div class="section">ingredients:</div>
                    @for ($i = 1; $i < 6; $i++)
                        @if ($drink['strIngredient' . $i] != '')
                            <div class="ingredient"> {{ $drink['strIngredient' . $i] }} {{ $drink['strMeasure' . $i] }}</div>
                        @endif
                    @endfor

                    <div class="section">Instructions:</div>
                    <div class="instructions">{{ $drink['strInstructions'] }}</div>

                    <div class="section">Glass:</div>
                    <div class="instructions">{{ $drink['strGlass'] }}</div>

                </div>
                <img src="{{ $drink['strDrinkThumb'] }}" alt='{{ $drink['strDrink'] }}'class="image" />
            </div>
            @if ($drink['strAlcoholic'] == 'Non alcoholic')
                <img src="{{ asset('img/no-al.png') }}" alt='no alcohol' class="alcohol" />
            @else
                <img src="{{ asset('img/al.png') }}" alt='alcoholic' class="alcohol" />
            @endif
        </div>
    </div>
@endsection
