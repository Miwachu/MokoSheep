<?php

use  Illuminate\Support\Facades\Routes;
use  App\Http\Controllers\LogController;

Route::get('/logs',[LogController::class,'index']);