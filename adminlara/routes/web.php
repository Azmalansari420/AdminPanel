<?php
require __DIR__.'/adminroute.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('contact', function () 
{
    return view('contact');
});


// Route::post('/contact-submit', [WebController::class, 'store']);
Route::post('/contact', [WebController::class, 'store'])->name('contact.store');

