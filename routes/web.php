<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

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

require __DIR__.'/auth.php';
