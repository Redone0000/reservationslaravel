<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;

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