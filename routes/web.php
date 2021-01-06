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

Route::get('/', function () {
    return view('index1');
});
Route::get('/admin1', function () {
    return view('admin1');
});
Route::resource('category','categorycontroller');
Route::resource('subcategory','subcatcontroller');
Route::resource('product','productcontroller');

Route::get('shop','usersidecontroller@ProductListing');
Route::get('productdetails/{id}','usersidecontroller@ProductDetails');
Route::get('/','usersidecontroller@ProductListing');
Route::get('aboutus','usersidecontroller@Aboutus');
Route::get('contactus','usersidecontroller@Contactus');

Route::post('add-cart-process/{id}','usersidecontroller@AddtoCartProcess');
Route::get('cart','usersidecontroller@CartListing');
Route::get('remove-cart/{id}','usersidecontroller@RemoveCart');
Route::post('update-cart/{id}','usersidecontroller@UpdateCart');
Route::post('place-order','usersidecontroller@PlaceOrder');

Route::get('thank-you','usersidecontroller@ThankYou');


Route::get('/admin1',function(){
    echo "Hello Admin";
})->middleware('auth','admin');

Route::get('/user',function(){
    echo "Hello user";
})->middleware('auth','user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index1']);
