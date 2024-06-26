<?php

use App\Http\Controllers\admin\CentreFormationController;
use App\Http\Controllers\admin\JoueurController;
use App\Http\Controllers\admin\RecruteurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return view("admin.accueil");
});
Route::get('/teste', function () {
    // return view('welcome');
    return view("test");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('joueur', JoueurController::class);
});


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('centre', CentreFormationController::class);
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('recruteur', RecruteurController::class);
});

require __DIR__.'/auth.php';
