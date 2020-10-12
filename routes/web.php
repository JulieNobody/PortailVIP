<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\PiecesDetacheesController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\MonCompteController;
use App\Http\Controllers\AdminController;
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

// ---------------------- INTERVENTIONS // ACCUEIL ----------------------

Route::get('/', function () {
    return redirect()->route('interventions');
});

Route::get('interventions', [InterventionController::class,'listeInterventions'])->name('interventions');
Route::get('interventions/filtres', [InterventionController::class,'listeInterventionsFiltrees'])->name('interventionsFiltrees');


// ---------------------- PIECES DETACHEES ----------------------
Route::get('pieces-detachees', [PiecesDetacheesController::class,'get'])->name('pieces-detachees');



// ---------------------- SUPPORT ----------------------
Route::get('support', [SupportController::class,'get'])->name('support');



// ---------------------- MON COMPTE ----------------------
Route::get('mon-compte', [MonCompteController::class,'get'])->name('mon-compte');



// ---------------------- AUTH ----------------------
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ---------------- ADMIN ----------------

Route::get('admin-liste', [AdminController::class,'liste'])
    ->name('admin-liste')
    ->middleware('App\Http\Middleware\Admin');

Route::get('admin-creation', [AdminController::class,'creationGet'])
    ->name('admin-creation-get')
    ->middleware('App\Http\Middleware\Admin');
Route::post('admin-creation', [AdminController::class,'creationPost'])
    ->name('admin-creation-post')
    ->middleware('App\Http\Middleware\Admin');

Route::get('admin-modification/{id}', [AdminController::class,'modificationGet'])
    ->name('admin-modification-get')
    ->middleware('App\Http\Middleware\Admin');
Route::post('admin-modification', [AdminController::class,'modificationPost'])
    ->name('admin-modification-post')
    ->middleware('App\Http\Middleware\Admin');



