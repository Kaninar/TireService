<?php

//use Illuminate\Foundation\Application;

use App\Http\Controllers\FilterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TireServiceController;
use App\Models\TireService;

Route::get('/', [HomeController::class, "__invoke"])->name("home");
Route::get('filter', [FilterController::class, "__invoke"])->name("filter");
