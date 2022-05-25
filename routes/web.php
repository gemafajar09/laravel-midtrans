<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;


Route::get('/', [PayController::class, 'index']);
