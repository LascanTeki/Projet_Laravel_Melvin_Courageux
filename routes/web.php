<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);
Route::get('/drink', [PostController::class, 'drink']);
Route::get('/list', [PostController::class, 'list']);
Route::get('/login', [PostController::class, 'login']);
Route::get('/signup', [PostController::class, 'signup']);
Route::get('/recovery', [PostController::class, 'recovery']);
Route::get('/*', [PostController::class, 'error']);

Route::post('/list', [PostController::class, 'search']);