

<div class="title" id="title" value={{ $query }}>Search results....</div>
    
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

