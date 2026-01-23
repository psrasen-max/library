<?php

use Illuminate\Support\Facades\Route;

Route::group([],function(){

    Route::get('/', function(){
        return redirect('/painel');
    });
    
    Route::get('/painel', function(){
        return view('dashboard');
    })->name('geral.painel');

    Route::get('/users/painel', function(){
        return view('users_dashboard');
    })->name('users.painel');

});