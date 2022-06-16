<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\employeesController;


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
Route::get('portfolio', function () {
    return view('portfolio');
});
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::post('/','App\Http\Controllers\ModController@dynamic')->name('form_submit');
Route::get('index_page','App\Http\Controllers\FrontendController@index')->name('index_page');
Route::get('modal','App\Http\Controllers\FrontendController@modal')->name('modal');
Route::get('create-crud','App\Http\Controllers\FrontendController@crud')->name('create_crud');
//kayy
Route::middleware(['auth'])->group(function(){
//routes for dynamic controller employee
Route::get('all-employees/{slug?}','App\Http\Controllers\employeeController@show')->name('show');
Route::get('employee-registeration/{slug?}','App\Http\Controllers\employeeController@create')->name('create');
Route::post('employee-registered/{slug?}','App\Http\Controllers\employeeController@store')->name('submit');
Route::get('employee-edit/{slug?}/{id?}','App\Http\Controllers\employeeController@edit')->name('edit');
Route::get('employee-delete/{slug?}/{id?}','App\Http\Controllers\employeeController@destroy')->name('delete');
Route::get('changeStatus/{slug?}/{id?}','App\Http\Controllers\employeeController@changestatus')->name('change_status');
//Routes for employee controller
Route::get('employees','App\Http\Controllers\employeesController@show')->name('showit');
Route::get('registeration','App\Http\Controllers\employeesController@create')->name('create1');
Route::post('registering','App\Http\Controllers\employeesController@store')->name('submit1');
Route::get('edit/{id}','App\Http\Controllers\employeesController@edit')->name('edit1');
Route::get('delete/{id}','App\Http\Controllers\employeesController@destroy')->name('delete1');
//routes for main controller
Route::get('mains','App\Http\Controllers\MainsController@show')->name('display');
Route::get('stat/{id?}','App\Http\Controllers\MainsController@stat')->name('stat');
 Route::get('roles', 'App\Http\Controllers\MainsController@rolespage')->name('roles');
 Route::post('role_submit', 'App\Http\Controllers\MainsController@role_submit')->name('role_submit');
  Route::get('dmail', 'App\Http\Controllers\MainsController@dmail')->name('dmail');
 Route::post('emailable', 'App\Http\Controllers\MainsController@emailable')->name('emailable');
 Route::get('newsletter','App\Http\Controllers\MainsController@newslet')->name('newsletter');
  Route::post('newletit','App\Http\Controllers\MainsController@newletit')->name('newletit');
  Route::get('subcategory','App\Http\Controllers\CategoryController@subcategory')->name('subcategory');
   Route::get('category','App\Http\Controllers\CategoryController@category')->name('category');
   Route::post('create-category','App\Http\Controllers\CategoryController@create_category')->name('create_category');
   Route::get('product','App\Http\Controllers\ProductController@product')->name('product');
   Route::get('fetch-product','App\Http\Controllers\ProductController@fetchproduct')->name('fetchproduct');
   Route::post('create-product','App\Http\Controllers\ProductController@create_product')->name('create_product');
   Route::get('edit-product/{id?}','App\Http\Controllers\ProductController@edit_product')->name('edit_product');
   Route::post('update-product','App\Http\Controllers\ProductController@update_product')->name('update_product');
   Route::get('chatting/{room?}','App\Http\Controllers\ChattingController@chatting')->name('chatting');
   
   Route::get('chatting-again','App\Http\Controllers\ChattingagainController@chatting_again')->name('chatting_again');
    Route::get('edit-product/{id?}','App\Http\Controllers\ProductController@edit_product')->name('edit_product');
     Route::post('create-chatting','App\Http\Controllers\ChattingController@create_chatting')->name('create_chatting');
     Route::post('create_chatting_again','App\Http\Controllers\ChattingagainController@create_chatting_again')->name('create_chatting_again');
     Route::get('call-chat','App\Http\Controllers\ChattingagainController@call_chat')->name('call_chat');
      Route::get('fetch-chatting','App\Http\Controllers\ChattingController@fetchchatting')->name('fetchchatting');
      Route::get('open-chat','App\Http\Controllers\ChattingController@openchat')->name('openchat');
       Route::get('openning-chat','App\Http\Controllers\ChattingagainController@opening_chat')->name('opening_chat');
       Route::get('fetch-chat/{room?}/{id?}','App\Http\Controllers\ChattingController@fetch_chats')->name('fetch_chats');
       Route::get('fetching','App\Http\Controllers\ChattingagainController@fetchingt')->name('fetchingt');

       Route::get('stripe','App\Http\Controllers\StripeController@stripe')->name('stripe');
       Route::post('stripe','App\Http\Controllers\StripeController@stripePost')->name('stripe.post');
      Route::get('paypal','App\Http\Controllers\StripeController@paypal')->name('paypal');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
