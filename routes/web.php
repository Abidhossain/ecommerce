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
    return view('front.pages.home');
});
 
 
Route::get('employee-login','Auth\LoginController@employee_login');
Auth::routes();

Route::group(['middleware'=>'auth'],function(){

//=========================Backend Route Here======================== //

//-------------------------Dashboard Route Here--------------------- //

Route::get('dashboard','Admin\IndexController@dashboard');

//----------------Employee Login/Register Route Here----------------//
Route::get('employee-register','Auth\RegisterController@employee_register');
//-------------------------Category Route Here--------------------- //

Route::get('category-list','Admin\CategoryController@category_list');
Route::post('category-add','Admin\CategoryController@category_add');
Route::get('category-read','Admin\CategoryController@category_read');
Route::get('category-edit/{id}','Admin\CategoryController@category_edit');
Route::post('category-update','Admin\CategoryController@category_update');
Route::get('category-active/{category_id}','Admin\CategoryController@category_active'); 
Route::get('category-inactive/{category_id}','Admin\CategoryController@category_inactive');
Route::get('category-delete/{category_id}','Admin\CategoryController@category_delete');

//-------------------------Size Route Here--------------------- //

Route::get('size-list','Admin\SizeController@size_list');
Route::post('size-add','Admin\SizeController@size_add');
Route::get('size-read','Admin\SizeController@size_read');
Route::get('size-edit/{id}','Admin\SizeController@size_edit');
Route::post('size-update','Admin\SizeController@size_update');
Route::get('size-active/{size_id}','Admin\SizeController@size_active'); 
Route::get('size-inactive/{size_id}','Admin\SizeController@size_inactive');
Route::get('size-delete/{size_id}','Admin\SizeController@size_delete');

//-------------------------Manufacture Route Here--------------------- //

Route::get('manufacture-list','Admin\ManufactureController@manufacture_list');
Route::post('manufacture-add','Admin\ManufactureController@manufacture_add');
Route::get('manufacture-read','Admin\ManufactureController@manufacture_read');
Route::get('manufacture-edit/{id}','Admin\ManufactureController@manufacture_edit');
Route::post('manufacture-update','Admin\ManufactureController@manufacture_update');
Route::get('manufacture-active/{manufacture_id}','Admin\ManufactureController@manufacture_active'); 
Route::get('manufacture-inactive/{manufacture_id}','Admin\ManufactureController@manufacture_inactive');
Route::get('manufacture-delete/{manufacture_id}','Admin\ManufactureController@manufacture_delete');

//-------------------------Product Route Here--------------------- //

Route::get('product-add','Admin\ProductController@product_add');
Route::post('product-add-process','Admin\ProductController@product_add_process');
Route::get('product-list','Admin\ProductController@product_list');
Route::get('product-edit/{product_id}','Admin\ProductController@product_edit');
Route::post('product-update','Admin\ProductController@product_update');
Route::get('product-delete/{product_id}','Admin\ProductController@product_delete');

//-------------------------Slider Route Here--------------------- //

Route::get('slider','Admin\SliderController@index');
Route::post('slider-add-process','Admin\SliderController@slider_add_process');
Route::get('slider-delete/{slider_id}','Admin\SliderController@slider_delete');

//-------------------------Brand Route Here-------------------------- //

Route::get('brand','Admin\SliderController@brand_index');
Route::post('brand-add-process','Admin\SliderController@brand_add_process');
Route::get('brand-delete/{brand_id}','Admin\SliderController@brand_delete');

//----------------------Order Management Route Here----------------------- //

Route::get('order-manager','Admin\OrderController@order_index');
Route::get('order-view-id/{ordre_id}','Admin\OrderController@order_view');
Route::get('order-place/{ordre_id}','Admin\OrderController@order_confirmation');

//-------------------------Brand Route Here-------------------------- //

Route::get('navbar-manage','Admin\NavbarController@navbar_index');
Route::post('navbar-add-process','Admin\NavbarController@navbar_store');
Route::get('navbar-read','Admin\NavbarController@navbar_read');


Route::get('sub-nav-manage','Admin\NavbarController@sub_nav_index');
Route::get('sub-nav-read','Admin\NavbarController@sub_nav_read');
Route::post('sub-nav-add-process','Admin\NavbarController@sub_nav_store');
});
//===============================================================//
//===================== Front Route Here========================== //
//===============================================================//

Route::get('index','Frontend\HomeController@index'); 
Route::post('product-details','Frontend\ProductDetailsController@product_details');

//-------------------------Payment Route Here--------------------- //

Route::get('payment','Frontend\PaymentController@payment_index');
Route::post('payment-method-process','Frontend\PaymentController@payment_method_process');


//-------------------------Shopping Cart Route Here--------------------- //

Route::get('show-cart','CartController@show_cart'); 
Route::post('cart-add','CartController@product_add');
Route::post('cart-update-process','CartController@update_cart_process'); 
Route::get('cart-destroy/{rowId}','CartController@cart_destroy');

//-------------------------Login Route Here-------------------------- //

Route::get('customer-login','Frontend\CheckoutController@login_index');
Route::post('customer-login-process','Frontend\CheckoutController@customer_login_process');
Route::post('customer-registration-process','Frontend\CheckoutController@customer_registration_process');
Route::get('customer-profile','Frontend\HomeController@customer_profile')->name('customer_profile');
Route::get('logout','Frontend\CheckoutController@logout');
Route::post('update-cutomer-info','Frontend\HomeController@update_customer_info');
Route::get('customer-shipping','Frontend\CheckoutController@shipping_page');
Route::post('customer-shipping-process','Frontend\CheckoutController@customer_shipping_address');

//-------------------------Copyright Route Here-------------------------- //

Route::get('Copyright','Frontend\HomeController@copyright_index'); 
Route::post('Copyright-update','Frontend\HomeController@copyright_update'); 


Route::get('/home', 'HomeController@index')->name('home');
