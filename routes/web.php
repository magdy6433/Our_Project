<?php

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


Auth::routes();


Route::group(['middleware'=>['guest']],function(){
    Route::get('/', function()
    {
        return view('auth.login');
    });
});

Route::group(['namespace' => 'Students'], function () {
    Route::resource('online_exams', 'OnlineExamController');
   Route::get('/indirect', 'OnlineExamController@indirectCreate')->name('indirect.create');
    Route::post('/indirect', 'OnlineExamController@storeIndirect')->name('indirect.store');

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

    // Route::get('/', function()
    // {
    //     return view('dashboard');
    // });

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

  //==============================dashboard============================
  Route::group(['namespace' => 'Levels'], function () {
    Route::resource('Levels', 'LevelController');
});

// Route::get('/levels', [LevelsController::class, 'index'])->name('pages.Levels.Levels');



    
});








