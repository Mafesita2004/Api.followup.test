<?php

use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\TrainerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return 'prueba';
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


//Apprentice
});
Route::prefix('apprentice')->group(function(){
 Route::get('list', [ApprenticeController::class,'index']);
 Route::post('create', [ApprenticeController::class,'store']);
 Route::get('show/{id}', [ApprenticeController::class,'show']);
 Route::put('update/{apprentice}', [ApprenticeController::class,'update']);
 Route::delete('destroy/{apprentice}', [ApprenticeController::class,'destroy']);
});

//trainers
 Route::prefix('trainers')->group(function(){
    Route::get('list', [TrainerController::class,'index']);
    Route::post('create', [TrainerController::class,'store']);
    Route::get('show/{trainers}', [TrainerController::class,'show']);
    Route::put('update/{trainers}', [TrainerController::class,'update']);
    Route::delete('delete/{trainers}', [TrainerController::class,'destroy']);
});
