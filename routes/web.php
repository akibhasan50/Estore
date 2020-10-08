<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

// fontend details
Route::get('/','PublicController@index')->name('index');
Route::get('/contact_us/','PublicController@contact');
Route::post('/search/','PublicController@searchItems');


//user auth
Route::get('/user-login/','AuthController@login');
Route::post('/user-registration/','AuthController@user_reg');
Route::post('/login-user/','AuthController@user_login');
Route::get('/logout-user/','AuthController@logoutuser');

//socialite auth

Route::get('/login/facebook', [AuthController::class, 'redirectToProvider']);
Route::get('user-login/login/facebook/callback', [AuthController::class, 'handleProviderCallback']);

Route::get('/login/google', [AuthController::class, 'redirectToProviderGoogle']);
Route::get('user-login/login/google/callback', [AuthController::class, 'handleProviderCallbackGoogle']);

//cart
Route::post('/cart/','CartController@addtocart');

//product details
Route::get('/product-by-category/{id}','PublicController@category_products');
Route::get('/product-by-subcategory/{id}','PublicController@subcategory_products');
Route::get('/product_details/{id}','PublicController@product_details');

//backend controller

Route::group(['middleware' => ['admin_auth']], function () {
    

        Route::get('/admin/','AdminController@index');
        Route::get('/admin/orders/','AdminController@orders');
        Route::get('/admin/orders-details/{id}','AdminController@ordersdetails');
        Route::get('/admin/orders-edit/{id}','AdminController@orderedit');
        Route::post('/admin/orders-update/{id}','AdminController@orderupdate');
        Route::get('/admin/orders-delete/{id}','AdminController@orderdelete');
        Route::get('/admin/pdf/{id}', 'AdminController@pdfDownload');
        //backend  category,product,subcategory
        Route::resource('/admin/categories', 'CategoryController');
        Route::resource('/admin/subcategory', 'SubcategoryController');
        Route::resource('/admin/products', 'ProductController')->except('create');

        Route::get('/admin/cngcatstatus/{id}', 'CategoryController@status');
        Route::get('/admin/changsubstatus/{id}', 'SubcategoryController@status');
        Route::get('/admin/changprodstatus/{id}', 'ProductController@status');
        Route::get('/admin/create/', 'ProductController@create')->name('products.create');
        Route::post('/admin/create/', 'ProductController@showsubcat')->name('products.showsubcat');
     
});

Route::get('/admin/login','AdminController@login');
Route::get('/admin/logout','AdminController@AdminLogout');
Route::post('/admin/login','AdminController@AdminLogin')->name('adminlogin');
Route::post('/admin/register','AdminController@AdminRegister');
Route::get('/admin/register','AdminController@register');

//product


Route::group(['middleware' => ['user_auth']], function () {
    
        //cart
        Route::get('/cart/','CartController@addtocart')->name('cart.addtocart');
        //Route::post('/cartadd/','CartController@cartAdd')->name('cartAdd');
 
        Route::get('/profile/','PublicController@ShowProfile');
        Route::get('/showcart/','CartController@showcart');
        Route::post('/update-cart/','CartController@updatecart');
        Route::get('cart-delete/{id}','CartController@deletecart');

        //checkout
        Route::get('/checkout/','PublicController@checkout');
      

        //order
        Route::post('/new-order/','OrderController@newOrder');
        Route::get('/confirmation-order/','OrderController@confirmationOrder');
        Route::get('/payment/','OrderController@payment');
        Route::post('/payment-done/','OrderController@paymentDone');



   
});