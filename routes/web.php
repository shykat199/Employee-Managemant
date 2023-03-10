<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\StateController;


Route::get('/', function () {
    return view('employees.index');
});


Route::resource('users',UserController::class);

Route::resource('countries',CountryController::class);
Route::resource('departments',DepartmentController::class);
Route::resource('cities',CityController::class);
Route::resource('states',StateController::class);


Route::get('{any}', static function (){
    return view('employees.index');
})->where('any','.*');




Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [UserController::class, 'index', 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
