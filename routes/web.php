<?php

use App\Http\Livewire\Teams;
use App\Http\Livewire\Players;
use App\Http\Livewire\Ranking;
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

// Route::get('/player', function () {
//     return view('player');
// });

Route::get('/players', Players::class);
Route::get('/teams', Teams::class);
Route::get('/rankings', Ranking::class);

