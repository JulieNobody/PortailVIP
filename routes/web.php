<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\PiecesDetacheesController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\MonCompteController;
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
    return view('login');
});

//Route::get('interventions', function () {
//    return view('Interventions\liste_interventions');
//});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('test');
});

Route::get('1', function() {
    return 'Je suis la première page !';
});

Route::get('interventions', [InterventionController::class,'listeInterventions'])->name('interventions');

Route::get('pieces-detachees', [PiecesDetacheesController::class,'get'])->name('pieces-detachees');

Route::get('support', [SupportController::class,'get'])->name('support');

Route::get('mon-compte', [MonCompteController::class,'get'])->name('mon-compte');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
