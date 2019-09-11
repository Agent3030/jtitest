<?php

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

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
Route::resources([
    'companies' => 'CompanyController',
    'posts' => 'PostController'
]);
=======
>>>>>>> 6fe1eee5e3eff5194ae52be3b45cc1005ff8ec47

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
