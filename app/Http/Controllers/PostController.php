<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOption\None;

class PostController extends Controller
{   

    public function index() {
        $categories = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/list.php?c=list');
        $categories = json_decode($categories, true);
        $categories = $categories['drinks'];

        for ($i=0; $i<3 ;$i++) { 
        $random = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/random.php');
        $random = json_decode($random, true);
        $random = $random['drinks'][0];
        $randoms[$i]['strDrink'] = $random['strDrink'];
        $randoms[$i]['strDrinkThumb'] = $random['strDrinkThumb'];
        }
        return view('Home', ['categories' => $categories, 'randoms' => $randoms]);
    }
    public function drink() {

        $drinkQ = request('drink');

        if ($drinkQ=="") {
            return redirect('/error');
        }

        $drinkQ = str_replace(' ', '%20', $drinkQ);

        $drink = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/search.php?s='.$drinkQ);
        $drink = json_decode($drink, true);
        
        return view('Drink', ['drink' => $drink['drinks'][0]]);
    }
    public function list() {
        return view('List');
    }
    public function login() {
        return view('login');
    }
    public function signup() {
        return view('Signup');
    }
    public function recovery() {
        return view('Recovery');
    }
    public function error() {
        return view('Error');
    }

    public function search(){
        $data = request('search');
        
    }
}

