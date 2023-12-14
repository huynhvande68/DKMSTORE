<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
/*define router authenticate*/

Auth::routes([
    'verify' => true,
]);



//=>> Admin Router

/*Home Admin*/
Route::get('/admin/index', 'Admin\HomeController@index')->name('admin.home')->middleware('auth');
Route::get('/admin/onload', 'Admin\HomeController@load')->name('admin.load')->middleware('auth');
Route::get('/admin/onload_dount', 'Admin\HomeController@load_dount')->name('admin.load.dount')->middleware('auth');
Route::post('/admin/statiscial-day', 'Admin\HomeController@statiscialDay')->name('admin.statiscialday')->middleware('auth');

// Route Category

Route::group(['prefix' => 'admin/category'], function () {
    //show category
    Route::get('/show', [
        'as' => 'admin.category.show',
        'uses' => 'Admin\CategoryController@index'
    ]);
    //create category
    Route::get('/create', [
        'as' => 'admin.category.create',
        'uses' => 'Admin\CategoryController@create'
    ]);
    //store category
    Route::post('/store', [
        'as' => 'admin.category.store',
        'uses' => 'Admin\CategoryController@store'
    ]);
    // edit category
    Route::get('/edit/{id}', [
        'as' => 'admin.category.edit',
        'uses' => 'Admin\CategoryController@edit'
    ]);
    // delete category
    Route::get('/delete/{id}', [
        'as' => 'admin.category.delete',
        'uses' => 'Admin\CategoryController@delete'
    ]);
});

// Router Login_form && Register_form
Route::get('admin/login', 'LoginRegisterController@showLogin')->name('user.login');
Route::get('admin/register', 'LoginRegisterController@showRegister')->name('user.register');
Route::post('admin/register', 'LoginRegisterController@checkRegister')->name('user.register');
Route::post('admin/login', 'LoginRegisterController@checkLogin')->name('user.login');
Route::get('admin/logout', 'LoginRegisterController@logout')->name('user.logout');
Route::get('admin/forgot-password', 'LoginRegisterController@forgot')->name('user.forgot');
Route::post('admin/reset-pass', 'LoginRegisterController@sendaMail')->name('user.sendmail');
Route::get('admin/reset-password/{token}', 'LoginRegisterController@reset')->name('user.reset');
Route::get('admin/form-reset', 'LoginRegisterController@formreset')->name('user.form.reset');
Route::post('admin/reset-confirm', 'LoginRegisterController@confirmreset')->name('user.confirm.reset');
// End Router Login_form && Register_form

// Router Product admin

Route::group(['prefix' => 'admin/product'], function () {
    //show product
    Route::get('/index', [
        'as' => 'admin.product.show',
        'uses' => 'Admin\ProductController@index'
    ]);
    Route::get('/create', [
        'as' => 'admin.product.create',
        'uses' => 'Admin\ProductController@create'
    ]);
    Route::post('/store', [
        'as' => 'admin.product.store',
        'uses' => 'Admin\ProductController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'admin.product.edit',
        'uses' => 'Admin\ProductController@edit'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'admin.product.delete',
        'uses' => 'Admin\ProductController@delete'
    ]);
    Route::post('/update/{id}', [
        'as' => 'admin.product.update',
        'uses' => 'Admin\ProductController@update'
    ]);
});
// Router Slide

Route::group(['prefix' => 'admin/slide'], function () {
    //show slide
    Route::get('/index', [
        'as' => 'admin.slide.show',
        'uses' => 'Admin\SlideController@index'
    ]);
    Route::post('/upload/store', [
        'as' => 'admin.slide.store',
        'uses' => 'Admin\SlideController@fileStore'
    ]);
    Route::post('/delete', [
        'as' => 'admin.slide.delete',
        'uses' => 'Admin\SlideController@fileDestroy'
    ]);
});

// Router coupon

Route::group(['prefix' => 'admin/coupon'], function () {
    //show coupon
    Route::get('/index', [
        'as' => 'admin.coupon.show',
        'uses' => 'Admin\CouponController@index'
    ]);
    //create coupon
    Route::get('/create', [
        'as' => 'admin.coupon.create',
        'uses' => 'Admin\CouponController@create'
    ]);
    //store coupon
    Route::post('/store', [
        'as' => 'admin.coupon.store',
        'uses' => 'Admin\CouponController@store'
    ]);
    //edit coupon
    Route::get('/edit/{id}', [
        'as' => 'admin.coupon.edit',
        'uses' => 'Admin\CouponController@edit'
    ]);
    //update coupon
    Route::post('/update/{id}', [
        'as' => 'admin.coupon.update',
        'uses' => 'Admin\CouponController@update'
    ]);
    //update coupon
    Route::get('/delete/{id}', [
        'as' => 'admin.coupon.delete',
        'uses' => 'Admin\CouponController@delete'
    ]);
});

// there is belong to customer

// Customer
Route::get('/home', 'User_m\UserController@index')->name('user.home');
Route::get('/', 'User_m\UserController@index')->name('user.home');
Route::get('/index', 'User_m\UserController@index2')->name('user.home2');
Route::get('/index/fillter_product', 'User_m\UserController@show_param')->name('user.show_param');
Route::get('/index/search_ajax', 'User_m\UserController@search_ajax')->name('user.search_ajax');

//Left-bar
Route::post('/index/search_product', 'User_m\UserController@search_leftbar')->name('user.search_leftbar');
Route::post('/index/search', 'User_m\UserController@search_sidebar')->name('user.search_sidebar');
Route::get('/index/sidebar/{param}', 'User_m\UserController@part_sidebar')->name('user.part_sidebar');
// product singer
Route::get('/home/{id}', 'User_m\UserController@product_singer')->name('user.product_singer');
// cart product
Route::get('/cart', 'User_m\CartController@viewCart')->name('cart.viewcart_product');
Route::get('cart/add-to-cart/{id}', 'User_m\CartController@addCart')->name('cart.addtocart');
Route::get('cart/update-to-cart', 'User_m\CartController@updateCart')->name('cart.updatetocart');
Route::get('cart/delete-to-cart/{id}', 'User_m\CartController@deleteCart')->name('cart.deletetocart');
// cart coupon
Route::post('/cart/coupon', 'Admin\CouponController@check')->name('checkcouponok');
//check out
Route::get('cart/checkout', 'User_m\CheckoutController@index')->name('index.checkout');
Route::get('cart/province', 'User_m\CheckoutController@check_province')->name('province');
Route::get('cart/district', 'User_m\CheckoutController@check_wards')->name('district');
Route::post('cart/payment', 'User_m\CheckoutController@payment_order')->name('paymentorder');


// login 
Route::get('/login', 'User_m\LgCustomer@showLogin')->name('customer.login');
Route::get('/register', 'User_m\LgCustomer@showRegister')->name('customer.register');
Route::post('/register', 'User_m\LgCustomer@checkRegister')->name('customer.register');
Route::post('/login', 'User_m\LgCustomer@checkLogin')->name('customer.login');
// my account
Route::get('/my-account', 'User_m\AccountCustomer@index')->name('my_account');
Route::get('/edit-account', 'User_m\AccountCustomer@edit')->name('edit_my_account');
Route::post('/update-account', 'User_m\AccountCustomer@update')->name('update_my_account');
Route::get('/detail-orders/{id}', 'User_m\AccountCustomer@detailorder')->name('detail_order');
Route::get('/err/{id}', 'User_m\AccountCustomer@errorder')->name('err_order');

//management order
Route::group(['prefix' => 'admin/order', 'as' => 'admin.order.'], function () {
    Route::get('/manager-order', 'Admin\ManagerOrder@index')->name('morder');
    Route::get('/detail-order/{idorder}', 'Admin\ManagerOrder@detail')->name('detail');
    Route::get('/convest-pdf/{id}', 'Admin\ManagerOrder@pdf')->name('convest-file');
    Route::get('/confim-order/{id}', 'Admin\ManagerOrder@confirmOrder')->name('confirmorder');
    Route::get('/remove-confim-order/{id}', 'Admin\ManagerOrder@removeconfirmOrder')->name('remove.confirmorder');
});
//read-at notification
Route::get('/read-at/{id}', 'Admin\ManagerOrder@readNotification')->name('admin.read.at');
//manage blog
Route::group(['prefix' => 'admin/blog'], function () {
    Route::get('/all-blog', 'Admin\BlogController@index')->name('admin.blog');
    Route::get('/create-blog', 'Admin\BlogController@create')->name('admin.create.blog');
    Route::post('/store-blog', 'Admin\BlogController@store')->name('admin.store.blog');
    Route::get('/edit-blog/{id}', 'Admin\BlogController@edit')->name('admin.edit.blog');
    Route::post('/update-blog/{id}', 'Admin\BlogController@update')->name('admin.update.blog');
    Route::post('/delete-blog/{id}', 'Admin\BlogController@delete')->name('admin.delete.blog');
});
// customer management
Route::group(['prefix' => 'admin/customer'], function () {
    Route::get('/all-user', 'Admin\MCustomerController@index')->name('admin.customer');
    Route::get('/detail-user/{id}', 'Admin\MCustomerController@detail')->name('admin.detail.customer');
    Route::post('/delete-user/{id}', 'Admin\MCustomerController@delete')->name('admin.delete.customer');
});
//sewnd mail coupon
Route::get('/admin/prepare-send-coupon', 'Admin\SendMailController@index')->name('admin.prepare.sendcoupon');
Route::post('/admin/send-coupon', 'Admin\SendMailController@send')->name('admin.sendcoupon');
// Route::get('/admin/prepare-send-test','Admin\SendMailController@test')->name('ss');
// blog 
Route::get('/blog', 'User_m\BlogController@index')->name('viewmainblog');
Route::get('/blog/{id}', 'User_m\BlogController@read')->name('readblog');
Route::get('/blog/tagproduct/{id}', 'User_m\BlogController@tag')->name('tagproduct');
Route::get('/blog/tagblog/{id}', 'User_m\BlogController@tagblog')->name('tagblog');
Route::post('/search/blog', 'User_m\BlogController@searchblog')->name('searchblog');
//about
Route::get('/about-us', 'User_m\AboutController@index')->name('aboutus');
Route::get('/contact', 'User_m\AboutController@contact')->name('contactme');

// manage user
Route::group(['prefix' => 'admin/manage-user'], function () {
    Route::get('/list', 'Admin\ManageUserController@index')->name('admin.index');
    Route::get('/create', 'Admin\ManageUserController@create')->name('admin.create.user');
    Route::post('/store', 'Admin\ManageUserController@store')->name('admin.store.user');
    Route::get('/edit/{id}', 'Admin\ManageUserController@edit')->name('admin.edit.user');
    Route::post('/update/{id}', 'Admin\ManageUserController@update')->name('admin.update.user');
    Route::post('/delete/{id}', 'Admin\ManageUserController@delete')->name('admin.delete.user');
    Route::get('/role-index', 'Admin\ManageUserController@roleIndex')->name('admin.role.user');
    Route::get('/role-create', 'Admin\ManageUserController@roleCreate')->name('admin.role.create');
    Route::get('/role-edit/{id}', 'Admin\ManageUserController@roleEdit')->name('admin.role.edit');
    Route::post('/role-delete/{id}', 'Admin\ManageUserController@roleDelete')->name('admin.role.delete');
    Route::post('/role-store', 'Admin\ManageUserController@roleStore')->name('admin.role.store');
    Route::post('/role-update/{id}', 'Admin\ManageUserController@roleUpdate')->name('admin.role.update');
    Route::get('/permission', 'Admin\ManageUserController@permission')->name('admin.permission');
    Route::post('/add-permission', 'Admin\ManageUserController@addPermission')->name('admin.add.permission');
    Route::post('/adds-permission', 'Admin\ManageUserController@addsPermission')->name('admin.adds.permission');
});

Route::get('/error', function () {
    return view(('admin.partial.error'));
})->name('error');

// schedule
Route::group(['prefix' => 'admin/schedule'], function () {

    Route::get('/index', 'Admin\ScheduleController@index')->name('admin.schedule.index');
    Route::post('/create', 'Admin\ScheduleController@createSchedule')->name('admin.schedule.create');
});
