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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::post('/contactMsg', 'PagesController@contactMsg');

Route::get('/projects/{domain}', 'ProjectController@show_project');
Route::get('/singleProject/{id}', 'ProjectController@single_project');
Route::post('/searchProject', 'ProjectController@search_project');
Route::get('/addProject', 'ProjectController@projectForm');
Route::post('/addProject', 'ProjectController@add_project');
Route::post('/storeProject', 'ProjectController@store_project');


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
