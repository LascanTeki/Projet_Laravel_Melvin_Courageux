<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->input('query');
        } else {
            $query = request('search');
        }

        $category = $request->input('category');
        $query = str_replace(' ', '_', $query);

        $results = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $query);

        // Results if a category in the homepage is clicked
        if (request('cat') && !($request->ajax())) {
            $cat = request('cat');
            $cat = str_replace(' ', '_', $cat);
            $results = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=' . $cat);

        // Results if there isn't any search but stil a filter
        } elseif ($request->ajax() && $query == "") {
            $category = str_replace(' ', '_', $category);
            $results = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=' . $category);
        }

        
        $results = json_decode($results, true);
        $results = $results['drinks'];


        $categories = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/list.php?c=list');
        $categories = json_decode($categories, true);
        $categories = $categories['drinks'];

        if ($category && $query != "") {
            $results = collect($results)->where('strCategory', $category)->toArray();
        }

        if ($request->ajax()) {

            //Generates new search results to replace the current ones
            return view('search_results', ['likes' => $results, 'categories' => $categories, 'query' => $query]);
        }

        return view('search', ['likes' => $results, 'categories' => $categories, 'query' => $query]);
    }
}
