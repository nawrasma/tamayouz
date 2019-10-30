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

Route::get('/', 'pagesController@home');
Route::get('/about', 'pagesController@about');
Route::get('/contact', 'pagesController@contact');
Route::post('/contactMsg', 'pagesController@contactMsg');

Route::get('/projects/{domain}', 'projectController@show_project');
Route::get('/singleProject/{id}', 'projectController@single_project');
Route::post('/searchProject', 'projectController@search_project');
Route::get('/addProject', 'projectController@projectForm');
Route::post('/addProject', 'projectController@add_project');
Route::post('/storeProject', 'projectController@store_project');


// Route::get('/', function () {


// 	$tasks = [
// 		"go to work",
// 		"go to market",
// 		"go to home"
// 	];
//     return view('welcome',[ 'tasks'=> $tasks , 'name'=> 'Nawras']);
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
