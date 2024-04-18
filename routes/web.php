<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RepresentationController;
use App\Models\User;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard");



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route pour les artistes

// Route pour afficher la liste des artistes via le contrôleur ArtistController.
Route::get('/artist', [ArtistController::class, 'index'])
    ->name('artist.index'); // Nomme la route pour référencement facile.

// Route pour afficher un artiste spécifique par ID avec validation numérique.
Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->where('id', '[0-9]+') // S'assure que l'ID est bien un nombre.
    ->name('artist.show'); // Nomme la route pour référencement facile.

Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
    ->where('id', '[0-9]+') // S'assure que l'ID est bien un nombre.
    ->name('artist.edit');

Route::put('/artist/{id}', [ArtistController::class, "update"])
    ->where('id', '[0-9]+') // S'assure que l'ID est bien un nombre.
    ->name('artist.update');

Route::get('/artist/create', [ArtistController::class, 'create'])
    ->name('artist.create');

Route::post('/artist',[ArtistController::class,'store'])
    ->name('artist.store');

Route::delete('/artist/{id}/delete', [ArtistController::class, 'destroy'])
    ->where('id', '[0-9]+')
    ->name('artist.delete');

Route::post('/artist/search', [ArtistController::class, 'search'])
    ->name('artist.search');
//route pour les shows

Route::get('/show', [ShowController::class, 'index'])
    ->name('show.index');

Route::get('/show/{id}', [ShowController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('show.show');

Route::get('/show/create', [ShowController::class, 'create'])
    ->name('show.create');
Route::post('/show', [ShowController::class, 'store'])
    ->name('show.store');

Route::get('/show/edit/{id}', [ShowController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->name('show.edit');
Route::put('show/{id}', [ShowController::class, 'update'])
    ->where('id', '[0-9]+')
    ->name('show.update');

Route::delete('/show/{id}', [ShowController::class, 'destroy'])
    ->where('id', '[0-9]+')
    ->name('show.delete');

Route::post('/show/search', [ShowController::class,'search'])
    ->name('show.search');

//location routes

Route::get('/location',[LocationController::class, 'index'])
    ->name('location.index');

Route::get('/location/{id}', [LocationController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('location.show');

Route::get('/location/create', [LocationController::class, 'create'])
    ->name('location.create');
Route::post('/location', [LocationController::class, 'store'])
    ->name('location.store');

Route::get('/location/edit/{id}', [LocationController::class, 'edit'])
    ->where('id','[0-9]+')
    ->name('location.edit');
Route::put('location/{id}', [LocationController::class, 'update'])
    ->where('id', '[0-9]+')
    ->name('location.update');

Route::delete('/location/{id}', [LocationController::class, 'destroy'])
    ->where('id', '[0-9]+')
    ->name('location.destroy');

Route::post('/location/search', [LocationController::class, 'search'])
    ->name('location.search');

//routes pour representation
Route::get('/representation', [RepresentationController::class, 'index'])
    ->name('representation.index');

//Route pour réservations

Route::get('/reservations/', [ReservationController::class, 'index'])
    ->name('reservations.index');

Route::post('/reservations/add', [ReservationController::class, 'post'])
    ->name('reservation.post');








require __DIR__.'/auth.php';
