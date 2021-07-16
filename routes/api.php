<?php

use App\Http\Controllers\API\ChargePrjController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\api\FicheController;
use App\Http\Controllers\API\IntervenantController;
use App\Http\Controllers\API\ProjetArchiveController;
use App\Http\Controllers\API\ProjetController;
use App\Http\Controllers\API\UserContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => ''], function (){
   Route::post('/login',[UserContoller::class, 'Login']);
   Route::get('/logout',[UserContoller::class, 'Logout'])->middleware('auth:api');
   Route::get('/users',[UserContoller::class,'index'])->middleware('auth:api');
   Route::post('/createChargerPrj',[UserContoller::class,'createChargerPrj'])->middleware('auth:api');
   Route::put('/users/{user}',[UserContoller::class,'update'])->middleware('auth:api');
});

Route::group(['prefix' => ''], function (){
    Route::post('affecter',[ProjetController::class, 'affecterInt']);
    Route::post('/desaffecter',[ProjetController::class, 'desaffecterInt']);
    Route::get('/intervPrj',[ProjetController::class, 'intervPrj']);
    Route::get('/projetsInterv',[IntervenantController::class, 'projetsInterv']);
});



Route::apiResources([
    'projet' => ProjetController::class,
    'projetarchive' => ProjetArchiveController::class,
    'client' => ClientController::class,
    'intervenant' => IntervenantController::class,
    'fiche' => FicheController::class,
    'ChargePrj' => ChargePrjController::class,

]);





