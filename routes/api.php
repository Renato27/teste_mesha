<?php

use App\Http\Controllers\Api\EletronicPointController;
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

Route::group(['middleware' => ['api']], function () {

    Route::resource('registers', EletronicPointController::class)->only('index', 'store', 'show');
    Route::post('register/{eletronicPoint}/validation', [EletronicPointController::class, 'validation']);

});

Route::fallback(function () {
    return response()->json([
        'message' => 'Página não encontrada. Se o erro continuar, entre em contato com ' . env('MAIL_TO'), //e-mail do desenvolvedor
    ], 404);
});
