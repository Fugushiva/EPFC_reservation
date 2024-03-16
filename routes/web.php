<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//controleur artist fonction "index" qui sera renvoyée sur '/artist'
Route::get('/artist', [ArtistController::class, 'index'])
    ->name('artist.index');

Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->where('id','[0-9]+')->name('artist.show');
