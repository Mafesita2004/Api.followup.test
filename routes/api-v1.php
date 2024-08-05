<?php

use App\Http\Controllers\ApprenticeController;
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