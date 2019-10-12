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

// Route::get('/', function () {
//     return view('pages.index');
// });
Route::get('index','PagesController@index')->name('index');
Route::get('about','PagesController@about')->name('about');
Route::get('contact','PagesController@contact')->name('contact');


//post

Route::get('create','PostController@writepost')->name('post.create');
Route::post('create/store','PostController@Store')->name('post.store');
Route::get('index/post','PostController@ViewPost')->name('post.index');
Route::get('view/post/{id}','PostController@PostView');
Route::get('edit/post/{id}','PostController@PostEdit');
Route::post('update/post/{id}','PostController@PostUpdate');
Route::get('delete/post/{id}','PostController@PostDelete');


Route::get('add/category','CategoryController@addCategory')->name('add.category');
Route::post('store/category','CategoryController@StoreCategory')->name('store.category');
Route::get('all/category','CategoryController@allCategory')->name('all.category');
Route::get('view/category/{id}','CategoryController@CategoryView');
Route::get('delete/category/{id}','CategoryController@CategoryDelete');
Route::get('edit/category/{id}','CategoryController@CategoryEdit');
Route::post('update/category/{id}','CategoryController@CategoryUpdate');

 // Route::group(['prefix' => '/events'], function(){
 //    Route::get('/', 'Backend\EventController@index')->name('admin.events');
 //    Route::get('/create', 'Backend\EventController@create')->name('admin.event.create');
 //    Route::get('/edit/{id}', 'Backend\EventController@edit')->name('admin.event.edit');
 //    Route::post('/store', 'Backend\EventController@store')->name('admin.event.store');
 //    Route::post('/event/edit/{id}', 'Backend\EventController@update')->name('admin.event.update');
 //    Route::post('/event/delete/{id}', 'Backend\EventController@delete')->name('admin.event.delete');
 //  });
