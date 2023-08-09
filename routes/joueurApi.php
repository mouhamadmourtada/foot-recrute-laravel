<?php

use App\Http\Controllers\API\AuthJoueurController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('joueur')->group(function (){

    Route::controller(AuthJoueurController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });


    // Route::controller(JoueurController::class)->group(function () {
    //     Route::get('joueurs', 'index');
    //     Route::get('joueurs/{id}', 'show');
    // });


});
