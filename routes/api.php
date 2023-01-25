<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ParoisseController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ConjointController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\AbandonController;
use App\Http\Controllers\StatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/me','me');
});
Route::controller(UserController::class)->group(function(){
    Route::get('/users','show');
});
Route::controller(ConferenceController::class)->group(function(){
    Route::get('/conferences','show');
});
Route::controller(DistrictController::class)->group(function(){
    Route::post('/store_district','store');
    Route::get('/districts','show');
    Route::put('/update_district/{id}','update');
    Route::post('/delete_district/{id}','delete');
});
Route::controller(ParoisseController::class)->group(function(){
    Route::post('/store_paroisse','store');
    Route::get('/paroisses','show');
    Route::put('/update_paroisse/{id}','update');
    Route::post('/delete_paroisse/{id}','delete');
});

Route::controller(MembreController::class)->group(function(){
    Route::post('/store_membre','store');
    Route::get('/membres','show');
    Route::get('/info_membre/{id}','info_membre');
    Route::get('/sumCotisation/{id}','sumCotisation');
});
Route::controller(CategorieController::class)->group(function(){
    Route::get('/categories','show');
});
Route::controller(ConjointController::class)->group(function(){
    Route::post('/store_conjoint','store');
    Route::put('/update_conjoint/{id}','update');
    Route::get('/conjoint/{id}','show');
    Route::post('/delete_conjoint/{id}','delete');
});
Route::controller(EnfantController::class)->group(function(){
    Route::get('/enfants/{id}','show');
    Route::post('/store_enfant','store');
    Route::put('/update_enfant/{id}','update');
    Route::post('/delete_enfant/{id}','delete');
});
Route::controller(CotisationController::class)->group(function(){
    Route::post('store_cotisation/','store');
    Route::get('membreCot','membreCot');
    Route::get('cotisations/','show');
    Route::put('update_cotisation/{id}','update');
});
Route::controller(AbandonController::class)->group(function(){
    Route::post('store_abandon','store');
    Route::get('abandons','show');
});
Route::controller(StatController::class)->group(function(){
    Route::get('district_count','district_count');
    Route::get('paroisse_count','paroisse_count');
    Route::get('membre_count','membre_count');
    Route::get('pension_count','pension_count');
    Route::get('cotisation_total','cotisation_total');
    Route::get('cotisation_total_non_paye','cotisation_total_non_paye');
    Route::get('recent_cot','recent_cot');
});