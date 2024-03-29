<?php

use  App\Http\Controllers\ProfileController;
use  Illuminate\Support\Facades\Routes;
use  App\Http\Controllers\LogController;
use  App\Http\Controllers\EmotionController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function(){
Route::get('/home',[LogController::class,'home'])->name('home');
Route::get('/logs',[LogController::class,'index']);
Route::get('/logs/create', [LogController::class, 'create']);
Route::get('/logs/{log}', [LogController::class ,'show']);
Route::post('/logs', [LogController::class, 'store']);
Route::get('/canvas',[LogController::class,'canvas']);
Route::get('/logs/{log}/edit', [LogController::class, 'edit']);
Route::put('/logs/{log}', [LogController::class, 'update']);
Route::delete('/logs/{log}', [LogController::class,'delete']);


});
require __DIR__.'/auth.php';