<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\Api\ApprenticeController;
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
});

 Route::get('apprentices', [ApprenticeController::class,'index'])->name('api.v1.apprentices.index');
 Route::post('apprentices', [ApprenticeController::class,'store'])->name('api.v1.apprentices.store');
 Route::get('apprentices/{apprentice}', [ApprenticeController::class,'show'])->name('api.v1.apprentices.show');
 Route::put('apprentices/{apprentice}', [ApprenticeController::class,'update'])->name('api.v1.apprentices.update');
 Route::delete('apprentices/{apprentice}', [ApprenticeController::class,'destroy'])->name('api.v1.apprentices.delete');

 //trainers
 Route::prefix('trainers')->group(function(){
    Route::get('list', [TrainerController::class,'index']);
    Route::post('create', [TrainerController::class,'store']);
    Route::get('show/{trainers}', [TrainerController::class,'show']);
    Route::put('update/{trainers}', [TrainerController::class,'update']);
    Route::delete('delete/{trainers}', [TrainerController::class,'destroy']);
});

// RUTAS ADMINISTRADOR
Route::prefix('administrators')->group(function(){
    Route::get('list', [AdministratorController::class,'index']);
    Route::post('create', [AdministratorController::class,'store']);
    Route::get('show/{administrators}', [AdministratorController::class,'show']);
    Route::put('update/{administrators}', [AdministratorController::class,'update']);
    Route::delete('delete/{administrators}', [AdministratorController::class,'destroy']);
});
