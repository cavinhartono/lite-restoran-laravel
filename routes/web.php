<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
  Route::get('/auth', 'index');
  Route::post('/auth/login', 'login');
  Route::post('/auth/register', 'register');
  Route::get('/auth/logout', 'logout')->middleware('IsLogin');
});

Route::middleware('IsLogin')->group(function () {
  Route::get('/', [AuthController::class, 'dashboard']);

  // Roles
  Route::middleware('can:view-role')->group(function () {
    Route::controller(RolesController::class)->group(function () {
      Route::get('/roles', 'index');
      Route::get('/roles/{id}/edit', 'edit');
      Route::put('/roles/{id}/update', 'update');
      Route::delete('/roles/delete', 'destroy');
    });
  });

  // Foods
  Route::controller(FoodController::class)->group(function () {
    Route::get('/menu', 'view');
    Route::get('/menu/add', 'add');
    Route::post('/menu/add/store', 'store');
    Route::get('/menu/{id}/edit', 'edit');
    Route::get('/menu/{id}/view', 'view');
    Route::put('/menu/{id}/update', 'update');
    Route::delete('/menu/delete', 'destroy');
  });

  // Users
  Route::middleware('can:view-user')->group(function () {
    Route::controller(UserController::class)->group(function () {
      Route::get('/user', 'index');
      Route::get('/user/{id}/edit', 'edit');
      Route::get('/user/{id}/view', 'view');
      Route::put('/user/{id}/update', 'update');
      Route::delete('/user/delete', 'destroy');
    });
  });
});
