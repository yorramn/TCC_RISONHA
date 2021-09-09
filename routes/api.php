<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});
*/
Route::group(['middleware'=>['auth:sanctum']],function(){

    Route::group(['prefix' => '/user'], function () {
        Route::get('/all', [UserController::class, 'index']);
        Route::post('/store',[UserController::class,'store']);
        Route::post('/login',[UserController::class,'login']);
    });

    Route::group(['prefix' => '/categoria'], function () {
        Route::get('/', [CategoriaController::class, 'index']);
        Route::get('/{id}', [CategoriaController::class, 'show']);
        Route::post('/', [CategoriaController::class, 'store']);
        Route::put('/{id}', [CategoriaController::class, 'update']);
        Route::delete('/{id}', [CategoriaController::class, 'destroy']);
    });
/*
    Route::group(['prefix' => '/produto'], function () {
        Route::get('/', [ProdutoController::class, 'index']);
        Route::get('/{id}', [ProdutoController::class, 'show']);
        Route::post('/', [ProdutoController::class, 'store']);
        Route::put('/{id}', [ProdutoController::class, 'update']);
        Route::delete('/{id}', [ProdutoController::class, 'destroy']);
    });
*/
    Route::group(['prefix' => '/cliente'], function () {
        Route::get('/', [ClienteController::class, 'index']);
        Route::get('/{id}', [ClienteController::class, 'show']);
        Route::post('/', [ClienteController::class, 'store']);
        Route::put('/{id}', [ClienteController::class, 'update']);
        Route::delete('/{id}', [ClienteController::class, 'destroy']);
    });
});
