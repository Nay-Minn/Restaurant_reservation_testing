<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Http\Livewire\RestaurantGroupComponent;
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
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();


Route::controller(DashboardController::class)->group(function () {
    Route::get('/home',  'index')->name('home');
    Route::get('/dashboard',  'index')->name('dashboard');
});


// Route::controller(RestaurantGroupsController::class)->group(function() {
//     Route::get('/restaurant_groups',  'index')->name('restaurant_groups');
//     Route::get('create_restaurant_groups',  "add")->name('create_restaurant_groups');
//     Route::post('create_restaurant_groups',  'create');
//     Route::get("restaurant_groups/details/{id}",  "details");
//     Route::get("restaurant_groups/edit/{id}",  "edit");
//     Route::post("restaurant_groups/edit/{id}",  "update");
//     Route::get("restaurant_groups/delete/{id}", 'delete');
// });



Route::controller(RestaurantController::class)->group(function () {
    Route::get('/restaurants', 'index')->name('restaurants');
    Route::get('/create-restaurant',  'add')->name('create_restaurant');
    Route::post('/create-restaurant',  'create');
    Route::get("restaurant/details/{id}",  'details');
    Route::get("restaurant/edit/{id}",  'edit');
    Route::post("restaurant/edit/{id}",  'update');
    Route::get("restaurant/delete/{id}",  'delete');
});

Route::controller(MenuController::class)->group(function () {
    Route::get('/menu', 'index')->name('menu');
    Route::get('/create-menu',  'create')->name('create_menu');
    Route::post('/create-menu',  'store')->name('menu_store');
    Route::get("menu/details/{id}",  'show');
    Route::get("menu/edit/{id}",  'edit');
    Route::post("menu/edit/{id}",  'update');
    Route::get("restaurant/delete/{id}",  'destroy');
});




Route::get('restaurant-groups', function () {
    return view('restaurant_groups.index');
})->name('restaurant_groups');

Route::get('payment-method', function () {
    return view('payment_method.index');
})->name('payment_method');

Route::get('discount-type', function () {
    return view('discount_type.index');
})->name('discount_type');

Route::get('discount-group', function () {
    return view('discount_group.index');
})->name('discount_group');

Route::get('menu-categories', function () {
    return view('menu_categories.index');
})->name('menu_categories');
Route::get('table', function () {
    return view('table.index');
})->name('table');

Route::get('file-export', [RestaurantGroupComponent::class, 'export'])->name('file_export');

Auth::routes();
