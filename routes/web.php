<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageTitleController;



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

// Route::get('/',function(){
//     return view('layout.index');
// });

Route::group(['midddleware'=>['auth']],function(){

    Route::get('/','PageController@dashboardindex')->name('page.dashboardindex');
    Route::get('/home','PageController@index')->name('page.index');
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::resource('page','PageController'); 
    Route::resource('page_titlt','PageTitleController');
});
Auth::routes();