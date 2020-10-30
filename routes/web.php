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


// ---------------------- AUTH ----------------------
Auth::routes(['verify' => true]);


Route::group(['middleware' => 'auth'], function () {

// ---------------------- INTERVENTIONS // ACCUEIL ----------------------

Route::get('/', function () {
    return redirect()->route('interventions');
});

Route::group(['middleware' => 'App\Http\Middleware\AccesListeInter'], function () {

    Route::get('interventions', [InterventionController::class,'listeInterventions'])->name('interventions');
    Route::get('interventions/filtres', [InterventionController::class,'listeInterventionsFiltrees'])->name('interventionsFiltrees');
    Route::get('detail-intervention/{id}',[InterventionController::class,'detailIntervention'])->name('detailIntervention');

});

Route::group(['middleware' => 'App\Http\Middleware\AccesDemandeInter'], function () {

    Route::get('demande-intervention',[InterventionController::class,'demandeInterventionGet'])->name('demandeInterventionGet');
    Route::Post('demande-intervention',[InterventionController::class,'demandeInterventionPost'])->name('demandeInterventionPost');
    Route::post('getInterventionSite',[InterventionController::class,'getInterventionSite'])->name('getInterventionSite');
});


// ---------------------- PIECES DETACHEES ----------------------
Route::group(['middleware' => 'App\Http\Middleware\AccesPiecesDetachees'], function () {

    Route::get('pieces-detachees', [PiecesDetacheesController::class,'get'])->name('pieces-detachees');

});



// ---------------------- SUPPORT ----------------------
Route::group(['middleware' => 'App\Http\Middleware\AccesSupport'], function () {

    Route::get('support', [SupportController::class,'get'])->name('support')->middleware('auth');

});

// ---------------------- MON COMPTE ----------------------
Route::group(['middleware' => 'App\Http\Middleware\AccesCompte'], function () {

    Route::get('mon-compte', [MonCompteController::class,'listParc'])->name('mon-compte');
    Route::get('mon-compte-parc-filtres', [MonCompteController::class,'listParcFiltres'])->name('mon-compte-parc-filtres');
    Route::get('detail-parc/{id}',[MonCompteController::class,'detailParc'])->name('detailParc');
});

// ---------------- ADMIN ----------------
Route::group(['middleware' => 'App\Http\Middleware\AccesAdmin'], function () {

    Route::get('admin-liste', [AdminController::class,'liste'])->name('admin-liste');
    Route::get('admin-detail/{id}', [AdminController::class,'detailUser'])->name('admin-detail');
    Route::get('admin-creation', [AdminController::class,'creationGet'])->name('admin-creation-get');
    Route::post('admin-creation', [AdminController::class,'creationPost'])->name('admin-creation-post');
    Route::get('admin-modification/{id}', [AdminController::class,'modificationGet'])->name('admin-modification-get');
    Route::post('admin-modification', [AdminController::class,'modificationPost'])->name('admin-modification-post');

});


});




