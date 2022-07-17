<?php

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

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});
*/

Auth::routes();
Route::get('reports/movie',[App\Http\Controllers\HomeController::class, 'movie'])->name('reports.movie');
Route::get('reports/partner',[App\Http\Controllers\HomeController::class, 'partner'])->name('reports.partner');
Route::get('reports/rental',[App\Http\Controllers\HomeController::class, 'rental'])->name('reports.rental');
Route::get('reports/economy',[App\Http\Controllers\HomeController::class, 'economy'])->name('reports.economy');
Route::get('reports/movieRental',[App\Http\Controllers\HomeController::class, 'movieRental'])->name('reports.movieRental');
//pdfs
Route::get('pdfs/economy',[App\Http\Controllers\HomeController::class, 'pdfeconomy'])->name('pdfs.economy');
Route::get('pdfs/movieRental',[App\Http\Controllers\HomeController::class, 'pdfmovieRental'])->name('pdfs.movieRental');
//downloads
Route::get('downloads/economy',[App\Http\Controllers\HomeController::class, 'downloadEconomy'])->name('downloads.economy');
Route::get('downloads/movieRental',[App\Http\Controllers\HomeController::class, 'downloadMovieRental'])->name('downloads.movieRental');



Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('pelicula', 'livewire.peliculas.index')->middleware('auth');
	Route::view('alquiler', 'livewire.alquilers.index')->middleware('auth');
	Route::view('socio', 'livewire.socios.index')->middleware('auth');
	Route::view('formato', 'livewire.formatos.index')->middleware('auth');
	Route::view('director', 'livewire.directors.index')->middleware('auth');
	Route::view('genero', 'livewire.generos.index')->middleware('auth');
	Route::view('actor_pelicula', 'livewire.actor-peliculas.index')->middleware('auth');
	Route::view('actor', 'livewire.actors.index')->middleware('auth');
	Route::view('sexo', 'livewire.sexos.index')->middleware('auth');
	
	