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
});
Route::controller(CategorieController::class)->group(function(){
    Route::get('/categories','show');
});
Route::controller(ConjointController::class)->group(function(){
    Route::post('/store_conjoint','store');
    Route::get('/conjoint/{id}','show');

});