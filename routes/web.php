<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::group([],function(){

    Route::get('/', function(){
        return redirect('/dashboard');
    });

    
    Route::get('/dashboard', function(){
        return view('dashboard');
    });

});