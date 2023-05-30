<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOption\None;
use App\Models\likes;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        $categories = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/list.php?c=list');
        $categories = json_decode($categories, true);
        $categories = $categories['drinks'];

        for ($i = 0; $i < 3; $i++) {
            $random = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/random.php');
            $random = json_decode($random, true);
            $random = $random['drinks'][0];
            $randoms[$i]['strDrink'] = $random['strDrink'];
            $randoms[$i]['strDrinkThumb'] = $random['strDrinkThumb'];
        }

        return view('homepage', ['categories' => $categories, 'randoms' => $randoms]);
    }
    public function drink()
    {

        $user_id = auth()->user();

        //gets drink infos

        $drinkQ = request('drink');

        if ($drinkQ == "") {
            return redirect('/error');
        }

        $drinkQ = str_replace(' ', '%20', $drinkQ);

        $drink = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $drinkQ);
        $drink = json_decode($drink, true);
        $drinkid = $drink['drinks'][0]['idDrink'];

        //checks if the user already liked the drink

        if ($user_id == null) {
            $iflike = false;
        } else {
            $user_id = auth()->user()->id;
            $iflike = likes::where('user_id', $user_id)->where('drink_id', $drinkid)->get();

            if ($iflike->isEmpty()) {
                $iflike = "nope";
            } else {
                $iflike = true;
            }
        }


        return view('drink', ['drink' => $drink['drinks'][0], 'heart' => $iflike]);
    }
    public function list()
    {
        return view('list');
    }

    public function fav()
    {
        $user_id = auth()->user();


        if ($user_id == null) {

            return redirect('/error');

        } else {

            $user_id = auth()->user()->id;
            $likes = likes::where('user_id', $user_id)->get();
            $i = 0;
            $drinks= null;

            foreach ($likes as $like) {

                $id = $like['drink_id'];
                $drink = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=' . $id);
                $drink = json_decode($drink, true);
                $drink = $drink['drinks'][0];
                $drinks[$i]=$drink;
                $i++;
            } 

            return view('fav', ['likes' => $drinks]);
        }
    }

    public function login()
    {
        return view('auth.login');
    }
    public function signup()
    {
        return view('auth.Register');
    }
    public function recovery()
    {
        return view('auth.verify');
    }
    public function error()
    {
        return view('Error');
    }

    public function search()
    {
        $data = request('search');
    }

    public function like(Request $request)
    {
        $user_id = auth()->user()->id;
        $drink = isset($_REQUEST['myData']) ? $_REQUEST['myData'] : "";

        $iflike = likes::where('user_id', $user_id)->where('drink_id', $drink)->get();

        if ($iflike->isEmpty()) {
            $like = new likes();

            $like->user_id = $user_id;
            $like->drink_id = $drink;
            $like->Like = true;

            $like->save();
            return ("no");
        } else {
            likes::where('user_id', $user_id)->where('drink_id', $drink)->delete();
            return ($iflike);
        }
    }
}
