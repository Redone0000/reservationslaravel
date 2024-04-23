<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\RepresentationController;

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

require __DIR__.'/auth.php';


// ARTIST
Route::get('artist', [ArtistController::class, 'index'])
    ->name('artist.index');
Route::post('/artist', [ArtistController::class, 'store'])
    ->name('artist.store');
Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->where('id', '[0-9]+')->name('artist.show');
Route::get('artist/create', [ArtistController::class, 'create'])
    ->name('artist.create');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
	->where('id', '[0-9]+')->name('artist.edit');
Route::put('/artist/{id}', [ArtistController::class, 'update'])
	->where('id', '[0-9]+')->name('artist.update');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
	->where('id', '[0-9]+')->name('artist.delete');

// TYPE
Route::get('/type', [TypeController::class, 'index'])
    ->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])
	->where('id', '[0-9]+')->name('type.show');
Route::get('type/create', [TypeController::class, 'create'])
    ->name('type.create');
Route::post('/type', [TypeController::class, 'store'])
    ->name('type.store');
Route::get('/type/edit/{id}', [TypeController::class, 'edit'])
	->where('id', '[0-9]+')->name('type.edit');
Route::put('/type/{id}', [TypeController::class, 'update'])
	->where('id', '[0-9]+')->name('type.update');
Route::delete('/type/{id}', [TypeController::class, 'destroy'])
	->where('id', '[0-9]+')->name('type.delete');

// Locality
Route::get('/locality', [LocalityController::class, 'index'])
    ->name('locality.index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('locality.show');
Route::get('locality/create', [LocalityController::class, 'create'])
    ->name('locality.create');
Route::post('/locality', [LocalityController::class, 'store'])
    ->name('locality.store');
Route::get('/locality/edit/{id}', [LocalityController::class, 'edit'])
	->where('id', '[0-9]+')->name('locality.edit');
Route::put('/locality/{id}', [LocalityController::class, 'update'])
	->where('id', '[0-9]+')->name('locality.update');
Route::delete('/locality/{id}', [LocalityController::class, 'destroy'])
	->where('id', '[0-9]+')->name('locality.delete');

// Location
Route::get('location', [LocationController::class, 'index'])
    ->name('location.index');
Route::get('location/{id}', [LocationController::class, 'show'])
    ->where('id', '[0-9]+')->name('location.show');
Route::get('location/create', [LocationController::class, 'create'])
    ->name('location.create');
Route::put('/location/{id}', [LocationController::class, 'update'])
	->where('id', '[0-9]+')->name('location.update');
Route::post('/location', [LocationController::class, 'store'])
    ->name('location.store');
Route::get('/location/edit/{id}', [LocationController::class, 'edit'])
	->where('id', '[0-9]+')->name('location.edit');
Route::delete('/location/{id}', [LocationController::class, 'destroy'])
	->where('id', '[0-9]+')->name('location.delete');

// Show 
Route::get('/show', [ShowController::class, 'index'])
    ->name('show.index');
Route::get('/show/{id}', [ShowController::class, 'show'])
    ->where('id', '[0-9]+')->name('show.show');

// Representation
Route::get('/representation', [RepresentationController::class, 'index'])
    ->name('representation.index');
Route::get('/representation/{id}', [RepresentationController::class, 'show'])
    ->where('id', '[0-9]+')->name('representation.show');

Route::feeds();

Route::get('/representation/{id}/book', [RepresentationController::class, 'book'])->where('id', '[0-9]+')->name('representation.book');