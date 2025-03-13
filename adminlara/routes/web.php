<?php
require __DIR__.'/adminroute.php';
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
