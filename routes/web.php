<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServicePcrovider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');
/* Directory */
Route::middleware(['auth:sanctum'])->resource('/directories', \App\Http\Controllers\DirectoryController::class);
/* Parametros */
Route::middleware(['auth:sanctum'])->resource('/states', \App\Http\Controllers\StateController::class)
    ->except('show');
Route::middleware(['auth:sanctum'])->resource('/titles', \App\Http\Controllers\TitleController::class)
    ->except('show');
Route::middleware(['auth:sanctum'])->resource('/offices', \App\Http\Controllers\OfficeController::class)
    ->except('show');
