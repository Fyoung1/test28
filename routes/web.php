<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::GET('/', [CarController::class, 'ShowCarsView'])->name('car.index');
Route::GET('/CarBrand', [CarBrandController::class, 'ShowCarBrandView']);
Route::GET('/CarModel', [CarModelController::class, 'ShowCarModelView']);
Route::GET('/EditCar', [CarController::class, 'ShowEditCarView']);

Route::get('/addCars', function () {
    return view('Cars.AddCarsPage');
});

Route::get('/addCarBrand', function () {
    return view('CarBrand.AddCarBrandPage');
});

Route::POST('/add-car-brand-to-base', [CarBrandController::class, 'CallModelToAddDataDb']);
Route::POST('/add-car-to-base', [CarController::class, 'CallModelToAddDataDb']);
Route::POST('/delete-from-db/{id}', [CarController::class, 'CallModelToDeleteDataDb']);
Route::put('/updateCar/{id}', [CarController::class, 'CallModelToEditDataDb'])->name('updateCar');
