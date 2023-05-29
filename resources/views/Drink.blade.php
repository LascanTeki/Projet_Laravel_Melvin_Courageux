@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/drink.css') }}">
@endsection





@section('content')
    <?php use App\Http\Controllers\PostController;
    ?>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script>
        var base_url = '{{ URL::to('/') }}';
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on("click", '.btn', function(e) {
            e.preventDefault();
            var drink = document.getElementById('button').value;
            console.log(drink)

            $.ajax({
                type: 'get',
                data: {
                    "myData": drink
                },
                url: "like",
                success: function(response) {
                    if (document.getElementById("heart").className == "far fa-heart") {
                        document.getElementById("heart").className = "fas fa-heart"
                    } else {
                        document.getElementById("heart").className = "far fa-heart"
                    }
                }
            });
        });
    </script>


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
            <button id="button" class="btn" value={{ $drink['idDrink'] }}><i class="far fa-heart"
                    id="heart"></i></button>

        </div>

        <script>
    
            const heart="<?php echo $heart; ?>";
    
            if (heart == true) {
                document.getElementById("heart").className = "fas fa-heart"
            }
            else if (heart == false) {
                document.getElementById("heart").className = "hidden"
            } 
            
        </script>

    </div>
@endsection
