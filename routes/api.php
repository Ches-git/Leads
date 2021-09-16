<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupItemController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserGroupItemController;
use App\Http\Controllers\UserImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
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
    Route::get('/users',function (Request $request){
       return $request->user()->all();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/user/update/', [AuthController::class, 'update']);

    //User image
    Route::post('/user/image/upload', [UserImageController::class, 'upload']);
    Route::get('/user/image/receive', [UserImageController::class, 'getImage']);

    //todos
    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/item/{id}', [ItemController::class, 'findTodo']);

    Route::post('/item/store', [ItemController::class, 'store']);
    Route::put('/item/{id}', [ItemController::class, 'update']);
    Route::delete('/item/{id}', [ItemController::class, 'destroy']);
    Route::patch('/todosCheckAll', [ItemController::class, 'updateAll']);
        //group todos
    Route::get('/group/{id}', [GroupItemController::class, 'index']);
    Route::post('/group/{id}/store', [GroupItemController::class, 'store']);
    Route::put('/group/item/{id}', [GroupItemController::class, 'update']);
    Route::delete('/group/item/{id}', [GroupItemController::class, 'destroy']);
    Route::patch('/group/{id}/todosCheckAll', [GroupItemController::class, 'updateAll']);
    Route::get('/groupItems/all', [GroupItemController::class, 'showAll']);



    //assignee
    Route::get('/group/item/assigneeName/{id}', [GroupItemController::class, 'findUser']);
    Route::put('/group/item/assignee/{id}/{userId}', [UserGroupItemController::class, 'store']);
    Route::delete('/group/item/assignee/{id}/{userid}', [UserGroupItemController::class, 'destroy']);



    //groups
    Route::get('/groups', [GroupController::class, 'index']);
    Route::get('/group/{id}/members', [GroupController::class, 'showMembers']);
    Route::post('group/{groupId}/{userId}',[UserGroupController::class,'groupAssign']);
    Route::post('group',[GroupController::class, 'store']);
    Route::get('/Allgroups', [GroupController::class, 'showAllGroups']);
    Route::delete('group/{id}',[GroupController::class, 'destroy']);




    //asiignees
    Route::get('/assignees', [UserGroupItemController::class, 'index']);

});

Route::post('/login', [AuthController::class ,'login']);
Route::post('/register', [AuthController::class ,'register']);

