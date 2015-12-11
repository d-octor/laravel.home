<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Task;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    return view('tasks', [
    	'tasks' => Task::orderBy('created_at', 'asc')->get()
    ]);
});

/*Route::get('/hello', function() {
  return 'Hello World';
});*/
Route::get('hello', 'Hello@index');
Route::get('/hello/{name}', 'Hello@show');

Route::get('/', 'Front@index');
Route::get('/products', 'Front@products');
Route::get('/products/details/{id}','Front@product_details');
Route::get('/products/categories','Front@product_categories');
Route::get('/products/brands','Front@product_brands');
Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::get('/logout','Front@logout');
Route::get('/cart','Front@cart');
Route::get('/checkout','Front@checkout');
Route::get('/search/{query}','Front@search');

Route::get('blade', function () {
  $drinks = array('Vodka', 'Gin', 'Brandy', 'Tot kto эto smozhet rasshifrovatь budet oshelomlёn 2244856');
  return view('page', array('name' => 'The Raven', 'day' => 'Friday', 'drinks' => $drinks));
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
	]);

	if ($validator->fails()) {
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	$task = new Task;
	$task->name = $request->name;
	$task->save();

	return redirect('/');
});


/**
 * Delete Task
 */
Route::delete('/task/{id}', function ($id) {
	Task::findOrFail($id)->delete();

	return redirect('/');
});
