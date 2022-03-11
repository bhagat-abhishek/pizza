<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');






// Admin Url Routes
Route::middleware('auth', 'is_admin')->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/pizza', [PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/pizza/create', [PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/create', [PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/edit/{id}', [PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/pizza/update/{id}', [PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('/pizza/delete/{id}', [PizzaController::class, 'destroy'])->name('pizza.destroy');

});