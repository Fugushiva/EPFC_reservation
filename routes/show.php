<?php


use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;


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
