<?php

use App\Http\Controllers\Api\ApprenticeController;
use App\Http\Controllers\AdministratorController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/Apprentice', [ApprenticeController::class,'store'])->name('api.apprentice');


// RUTAS ADMINISTRADOR
Route::post('/administrator', [AdministratorController::class,'store'])->name('api.administrator');

 Route::get('administrators', [AdministratorController::class,'index'])->name('api.administrator.index');
 Route::post('administrators', [AdministratorController::class,'store'])->name('api.administrator.store');
 Route::get('administrators/{administrator}', [AdministratorController::class,'show'])->name('api.administrator.show');
 Route::put('administrators/{administrator}', [AdministratorController::class,'update'])->name('api.administrator.update');
 Route::delete('cadministrators/{administrator}', [AdministratorController::class,'destroy'])->name('api.administrator.delete');
