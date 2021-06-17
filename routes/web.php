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


// user
Route::middleware(['auth'])->group(function(){

  Route::get('/dashboard', 'ProfileController@index')->name('dashboard');
  Route::get('/edit-profile', 'ProfileController@edit_profile');
  Route::post('/edit-profile', 'ProfileController@update_profile');
  Route::get('/change-password', 'ProfileController@change_password');
  Route::post('/change-password', 'ProfileController@update_password');

  // bio
  Route::get('/my-bio', 'ProfileController@my_bio');
  Route::post('/add-bio', 'ProfileController@add_bio');
  Route::post('/update-bio', 'ProfileController@update_bio');
 

  // job
  Route::post('/post-job', 'ProfileController@post_job');
  Route::get('/my-job', 'ProfileController@my_job');
  Route::get('/job/edit/{id}', 'ProfileController@job_edit');
  Route::get('/job/delete/{id}', 'ProfileController@destroy');
  Route::post('/update-job', 'ProfileController@job_update');
  Route::post('/post-bid', 'ProfileController@post_bid');
  Route::get('/show-profile/{id}/job/{jid}', 'ProfileController@show_profile');

  //message
   Route::post('/start-chat', 'ProfileController@start_chat');
   Route::get('/message', 'ProfileController@message');
   Route::get('/message/user/{id}', 'ProfileController@single_message');

   // order
   Route::get('/my-order', 'ProfileController@my_order');
   Route::get('/order/completed/{id}', 'ProfileController@order_completed');
   Route::post('/confirm-order-completed', 'ProfileController@confirm_order_completed');
   Route::get('/order/cancel/{id}', 'ProfileController@order_cancel');
   Route::get('/order/download/{id}', 'ProfileController@order_download');

   //withdraw
   Route::get('/withdraw', 'ProfileController@withdraw');
   Route::post('/withdraw-request', 'ProfileController@withdraw_request');



});


require __DIR__.'/auth.php';




Route::get('/','WelcomeController@index');
Route::get('about','WelcomeController@about');
Route::get('works','WelcomeController@works');
Route::get('jobs','WelcomeController@jobs');
Route::get('category/{cat}','WelcomeController@category');
Route::get('contact','WelcomeController@contact');
Route::post('contact','WelcomeController@contact_store');
Route::get('post-job','WelcomeController@post_job');
Route::get('job/details/{id}','WelcomeController@job_details');





//Admin login route
Route::get('admin/login', 'Auth\AdminAuthenticatedSessionController@create');
Route::post('/admin/login', 'Auth\AdminAuthenticatedSessionController@store');


Route::group(['middleware'=>'auth:admin'], function(){  

	Route::post('admin/logout', 'Auth\AdminAuthenticatedSessionController@destroy');
    Route::get('admin/dashboard', 'AdminController@dashboard');


    // category
	Route::get('/admin/category', 'CategoryController@read');
	Route::get('/admin/category/create', 'CategoryController@create');
	Route::post('/admin/category/create', 'CategoryController@store');
	Route::get('/admin/category/{id}/edit', 'CategoryController@edit');
	Route::post('/admin/category/update', 'CategoryController@update');
	Route::get('/admin/category/{id}/delete', 'CategoryController@destroy');


	// category
	Route::get('/admin/percentage', 'PercentageController@read');
	Route::get('/admin/percentage/create', 'PercentageController@create');
	Route::post('/admin/percentage/create', 'PercentageController@store');
	Route::get('/admin/percentage/{id}/edit', 'PercentageController@edit');
	Route::post('/admin/percentage/update', 'PercentageController@update');
	Route::get('/admin/percentage/{id}/delete', 'PercentageController@destroy');



	//user
	Route::get('/admin/user', 'UserController@read');
	Route::get('admin/user/{id}/delete', 'UserController@destroy');


	//job
	Route::get('/admin/job', 'JobController@read');
	Route::get('admin/job/{id}/delete', 'JobController@destroy');


    //order
	Route::get('/admin/order', 'OrderController@read');
	Route::get('/admin/order/cancel', 'OrderController@cancel');
	Route::get('admin/order/{id}/delete', 'OrderController@destroy');


	//withdraw
	Route::get('/admin/withdraw', 'WithdrawController@read');
	Route::get('admin/withdraw/{id}/status', 'WithdrawController@status');


	//contact
	Route::get('/admin/contact', 'ContactController@read');
	Route::get('admin/contact/{id}/details', 'ContactController@show');
	Route::get('admin/contact/{id}/delete', 'ContactController@destroy');


    //profile
    Route::get('admin/profile', 'AdminController@profile');
    Route::get('admin/edit-profile', 'AdminController@edit_profile');
    Route::post('admin/edit-profile', 'AdminController@update_profile');

    Route::get('admin/change-password', 'AdminController@change_password');
    Route::post('admin/change-password', 'AdminController@update_password');


});









// SSLCOMMERZ Start
Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');
Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END
