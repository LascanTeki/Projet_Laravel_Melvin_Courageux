<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{   
    public function index() {
        return view('Home');
    }
    public function drink() {
        return view('Drink');
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
}
