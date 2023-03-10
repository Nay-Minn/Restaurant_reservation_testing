<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantGroupsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::controller(DashboardController::class)->group(function() {
    Route::get('/home',  'index')->name('home');
    Route::get('/dashboard',  'index')->name('dashboard');
});


Route::controller(RestaurantGroupsController::class)->group(function() {
    Route::get('/restaurant_groups',  'index')->name('restaurant_groups');
    Route::get('create_restaurant_groups',  "add")->name('create_restaurant_groups');
    Route::post('create_restaurant_groups',  'create');
    Route::get("restaurant_groups/details/{id}",  "details");
    Route::get("restaurant_groups/edit/{id}",  "edit");
    Route::post("restaurant_groups/edit/{id}",  "update");
    Route::get("restaurant_groups/delete/{id}", 'delete');
});



Route::controller(RestaurantController::class)->group(function () {
    Route::get('/restaurants','index')->name('restaurants');
    Route::get('/create_restaurant',  'add')->name('create_restaurant');
    Route::post('/create_restaurant',  'create');
    Route::get("restaurant/details/{id}",  'details');
    Route::get("restaurant/edit/{id}",  'edit');
    Route::post("restaurant/edit/{id}",  'update');
    Route::get("restaurant/delete/{id}",  'delete');
});



Auth::routes();
