<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ErrorController;
use \App\Http\MiddleWare\Authorization;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix("user")->group(function(){
    Route::post("authenticate", [AuthenticateController::class, "auth"]);
});

Route::prefix("user")->middleware(Authorization::class)->group(function(){
    Route::post("/", [UserController::class, "register"]);
});
