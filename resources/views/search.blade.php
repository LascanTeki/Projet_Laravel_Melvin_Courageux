@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}">
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category').change(function(e) {
            e.preventDefault(); // Prevent the form from submitting normally
            var category = $('#category').val();
            var query = document.getElementById('title').getAttribute('data-query');
            console.log(category);

            $.ajax({
                url: 'search',
                type: 'GET',
                data: { query: query, category: category },
                success: function(response) {
                    $('#Main').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


    <div class="content">
        <div class="filter"></div>
        <select name="category" id ="category">
            @foreach ($categories as $category)
            <option value="{{$category['strCategory']}}">{{$category['strCategory']}}</option>
            @endforeach
        </select>
        <div id="Main">

            <div class="title" id="title" data-query={{ $query }}>Search results....</div>
            
            @if ($likes == null)
                <div class="none">Nothing corresponds to your search...</div>
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
