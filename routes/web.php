<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvShowController;
use Facade\FlareClient\View;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('details', function () {
    return view('details');
})->name('details');

Route::get('/', [MoviesController::class, 'index'])->name('home');
Route::get('/movie/{movie}', [MoviesController::class, 'show'])->name('movie.show');
Route::get('/actors', [ActorController::class, 'index'])->name('actors');
Route::get('/actors/page={page}', [ActorController::class, 'index'])->name('actors.page');
Route::get('actor/{id}', [ActorController::class, 'show'])->name('actor.show');
Route::get('/tv-shows', [TvShowController::class, 'tvShows'])->name('tv.shows');
Route::get('/tv-shows/{id}', [TvShowController::class, 'ShowTvShows'])->name('show.shows');
