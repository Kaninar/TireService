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

Route::get("/serivces", [TireServiceController::class, "index"])->name("service.index");
Route::get("/services/create", [TireServiceController::class, "create"])->name("service.create");
Route::post("/services", [TireServiceController::class, "store"])->name("servcie.store");
Route::get("/services/{service}", [TireServiceController::class, "show"])->name("service.show");
Route::get("/services/{service}/edit", [TireServiceController::class, "edit"])->name("serive.edit");
Route::patch("/services/{service}", [TireServiceController::class, "update"])->name("service.update");
Route::delete("services/{service}", [TireServiceController::class, "destroy"])->name("service.destroy");
