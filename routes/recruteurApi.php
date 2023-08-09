<?php

use App\Http\Controllers\recruteur\JoueurController;
use App\Http\Controllers\API\AuthRecruteurController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('recruteur')->group(function (){
    Route::controller(AuthRecruteurController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });


    Route::controller(JoueurController::class)->group(function () {
        Route::get('joueurs', 'index');
        Route::get('joueurs/{id}', 'show');
    });

});

