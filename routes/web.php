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

//Static Pages
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::post('/contactMsg', 'PagesController@contactMsg');

//Dynamic Pages
Route::get('/projects/{id}', 'ProjectController@show_project');
Route::get('/singleProject/{id}', 'ProjectController@single_project');
Route::post('/searchProject', 'ProjectController@search_project');
Route::get('/addProject', 'ProjectController@projectForm');
Route::post('/storeProject', 'ProjectController@store_project');
// Route::post('/addProject', 'ProjectController@add_project');
// Route::post('/ajaxVideoType', 'ProjectController@ajaxRequestVideoType');

// all users Pages
Auth::routes();
// Admin Pages
Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
Route::patch('/updateAccount', 'HomeController@updateAccount')->name('update');
Route::get('/dashboard', 'HomeController@dashboradPage')->name('dashboard');
Route::get('/home/projects', 'HomeController@all_projects')->name('Projects');
Route::get('/home/project/{proID}', 'HomeController@single_project')->name('single project');
Route::get('/home/projectAdd', 'HomeController@add_project')->name('add project');
Route::post('/home/projectStroe', 'HomeController@store_project')->name('store project');
Route::patch('/home/updateGradeRecommend', 'HomeController@updateGradeRecommend')->name('update GradeRecommend');
Route::delete('/home/destroyProject', 'HomeController@destroyProject')->name('destroy project');
Route::patch('/home/updateProject', 'HomeController@updateProject')->name('update project');
Route::get('/home/notifications', 'HomeController@all_notification')->name('notifications');
Route::get('/home/messages/{user}', 'HomeController@all_message')->name('messages');
Route::post('/home/search_project', 'HomeController@search_project')->name('Search Projects');
Route::post('/ajaxProjectCat', 'HomeController@ajaxPrpjectsCat');
Route::post('/ajaxAddTask', 'HomeController@ajaxAddTask');
Route::post('/ajaxDeleteTask', 'HomeController@ajaxDeleteTask');
Route::post('/ajaxDoneTask', 'HomeController@ajaxDoneTask');
Route::post('/ajaxShowNoty', 'HomeController@ajaxShowNoty');
Route::post('/ajaxAddMsg', 'HomeController@ajaxAddMsg');
//sittings pages for user 
Route::get('/home/showUsers', 'SittingsController@showUsers')->name('show users');
Route::get('/home/addUser', 'SittingsController@addUser')->name('add user');
Route::post('/home/storeUser', 'SittingsController@storeUser')->name('store user');
Route::post('/ajaxgetdataUPdate', 'SittingsController@ajaxgetdataUPdate');
Route::patch('/home/updateUser', 'SittingsController@updateUser')->name('update user');
Route::delete('/home/deleteUser', 'SittingsController@deleteUser')->name('delete user');
//sittings pages for season 
Route::get('/home/showSeasons', 'SittingsController@showSeasons')->name('show seasons');
Route::get('/home/addSeason', 'SittingsController@addSeason')->name('add season');
Route::post('/home/storeSeason', 'SittingsController@storeSeason')->name('store season');
Route::post('/ajaxSeasonDataUPdate', 'SittingsController@ajaxSeasonDataUPdate');
Route::patch('/home/updateSeason', 'SittingsController@updateSeason')->name('update season');
Route::delete('/home/deleteSeason', 'SittingsController@deleteSeason')->name('delete season');
//sittings pages for category 
Route::get('/home/showCategories', 'SittingsController@showCategories')->name('show categories');
Route::get('/home/addCategory', 'SittingsController@addCategory')->name('add category');
Route::post('/home/storeCategory', 'SittingsController@storeCategory')->name('store category');
Route::post('/ajaxCategoryDataUPdate', 'SittingsController@ajaxCategoryDataUPdate');
Route::patch('/home/updateCategory', 'SittingsController@updateCategory')->name('update category');
Route::delete('/home/deleteCategory', 'SittingsController@deleteCategory')->name('delete category');

// Manager Pages
Route::get('/homeManager', 'ManagerController@index')->name('home');
Route::patch('/homeManager/updateAccount', 'ManagerController@updateAccount')->name('update');
Route::get('/homeManager/dashboard', 'ManagerController@dashboradPage')->name('dashboard');
Route::get('/homeManager/projects', 'ManagerController@all_projects')->name('Projects');
Route::get('/homeManager/project/{proID}', 'ManagerController@single_project')->name('single project');
Route::get('/homeManager/projectAdd', 'ManagerController@add_project')->name('add project');
Route::post('/homeManager/projectStroe', 'ManagerController@store_project')->name('store project');
Route::patch('/homeManager/updateGradeRecommend', 'ManagerController@updateGradeRecommend')->name('update GradeRecommend');
Route::delete('/homeManager/destroyProject', 'ManagerController@destroyProject')->name('destroy project');
Route::patch('/homeManager/updateProject', 'ManagerController@updateProject')->name('update project');
Route::get('/homeManager/notifications', 'ManagerController@all_notification')->name('notifications');
Route::get('/homeManager/messages/{user}', 'ManagerController@all_message')->name('messages');
Route::post('/homeManager/search_project', 'ManagerController@search_project')->name('Search Projects');
Route::post('/ajaxAddTask', 'ManagerController@ajaxAddTask');
Route::post('/ajaxDeleteTask', 'ManagerController@ajaxDeleteTask');
Route::post('/ajaxDoneTask', 'ManagerController@ajaxDoneTask');
Route::post('/ajaxShowNoty', 'ManagerController@ajaxShowNoty');
Route::post('/ajaxAddMsg', 'ManagerController@ajaxAddMsg');





// Student Pages
Route::get('/homeStudent', 'StudentController@index')->name('home');
Route::patch('/homeStudent/updateAccount', 'StudentController@updateAccount')->name('update');
Route::get('/homeStudent/project', 'StudentController@single_project')->name('single project');
Route::patch('/homeStudent/updateProject', 'StudentController@updateProject')->name('update project');

// Auth::routes();


