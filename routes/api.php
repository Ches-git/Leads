<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\CommenterController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\UserImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/users', function (Request $request) {
        return $request->user()->all();
    });
//    Route::delete('/user/delete')
            Route::delete('/user/delete/{id}', [AuthController::class, 'destroy']);


    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/user/update/{id}', [AuthController::class, 'update']);



    //User image
    Route::post('/user/image/upload/{id}', [UserImageController::class, 'upload']);
    Route::get('/user/image/receive', [UserImageController::class, 'getImage']);

    //Leads
    Route::get('/leads', [LeadsController::class, 'index']);
    Route::put('/lead/{id}', [LeadsController::class, 'update']);
    Route::delete('/lead/{id}', [LeadsController::class, 'destroy']);

    //Commenters
    Route::post('/comment/{id}', [CommenterController::class, 'store']);
    Route::get('/comment/{id}', [CommenterController::class, 'index']);

    //Audit
    Route::get('/history', [AuditController::class, 'index']);

});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/lead', [LeadsController::class, 'store']);

