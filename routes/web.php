<?php

use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::middleware('guest')->group(function () {
 
        Route::controller(AuthController::class)->group(function() {
            Route::get('register', 'register')->name('register');
            Route::post('register', 'registerSave')->name('register.save');

            Route::get('login', 'login')->name('login');
            Route::post('login', 'loginAction')->name('login.action');
            
        });


});



// logout functinality
Route::get('logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware('auth')->group(function() {


    Route::get('dashboard',function(){
        return view('dashboard');

    })->name('dashboard');


    Route::get('booksborrowed',function(){
        return view('booksborrowed');

    })->name('booksborrowed');

    Route::get('returnedbooks',function(){
        return view('returnedbooks');

    })->name('returnedbooks');

    Route::get('sciencebooks',function(){
        return view('category/sciencebooks');

    })->name('sciencebooks');

    Route::get('englishbooks',function(){
        return view('category/englishbooks');

    })->name('englishbooks');

    Route::get('mathematicsbooks',function(){
        return view('category/mathematicsbooks');

    })->name('mathematicsbooks');



    
    Route::get('booksmanagement',function(){
        return view('booksmanagement');

    })->name('booksmanagement');

    Route::get('transactions',function(){
        return view('transactions');

    })->name('transaction');




});