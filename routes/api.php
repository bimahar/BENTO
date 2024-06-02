<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/menu", [MenuController::class, 'index']);
Route::get('/menu/{kategori}', [MenuController::class, 'showByCategory'])->name('showmenubycategory');
Route::get("/categories", [MenuController::class, 'categories']);

Route::post('/midtrans-callback', [CartController::class, 'callback']);