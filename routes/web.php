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
Auth::routes();
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login.submit');
Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('regist');
Route::post('/register','Auth\RegisterController@register')->name('regist.submit');
Route::get('/','HomeController@home')->name('home');
Route::get('/how-to-order','HomeController@how_to_order')->name('how-to-order');
Route::get('/DitonKing300ML','HomeController@spray1')->name('spray300ml');
Route::get('/DitonKing400ML','HomeController@spray2')->name('spray400ml');
Route::get('/Custom','HomeController@custom')->name('custom');
Route::get('/product','HomeController@product')->name('product');
Route::get('/product/{id}','HomeController@product_show')->name('product_show');
Route::get('/order/{id}', 'OrderController@index')->name('order.index');
Route::post('/order/{id}', 'OrderController@order')->name('order');




Route::get('/event','HomeController@event')->name('event');
Route::get('/event/{id}','HomeController@event_show')->name('event_show');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::prefix('user')->group(function () {
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('user.password.reset');
    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@update');

    Route::get('history', 'HistoryController@index');
    Route::get('history/{id}', 'HistoryController@detail');
    Route::get('history/cetak_history/{id}','HistoryController@cetak_history');
    Route::get('/check_out', 'OrderController@check_out')->name('check_out');
    Route::delete('/check_out/{id}', 'OrderController@delete')->name('checkout_delete');
    Route::get('konfirmasi_check_out', 'OrderController@konfirmasi');

});

Route::prefix('admin')->group(function () {
        Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

        // Update Panel
        Route::get('/data_admin', 'AdminController@data_admin')->name('admin.data_admin');
        Route::post('/data_admin', 'AdminController@tambah_data_admin')->name('admin.tambah_data_admin');
        Route::get('/{id}/delete','AdminController@delete_admin')->name('admin.delete_admin');
        // Data User
        Route::get('/data_user', 'AdminController@data_user')->name('admin.data_user');
        Route::get('/{id}/delete','AdminController@delete_user')->name('admin.delete_user');
        Route::get('/user_profile/{id}','AdminController@user_profile')->name('admin.user_profile');

        // Data Produk
        Route::get('/product', 'AdminController@product')->name('admin.product');
        Route::post('/product', 'AdminController@tambah_data_product')->name('admin.tambah_data_product');
        Route::get('/detail_product/{product_id}', 'AdminController@product_show')->name('admin.product_show');
        Route::match(['put','patch'],'/detail_product/{product_id}', 'AdminController@product_update')->name('admin.product_update');
        Route::get('/product/{id}/delete','AdminController@delete_product')->name('admin.delete_product');

        // Data Event
        Route::get('/event', 'AdminController@event')->name('admin.event');
        Route::post('/event', 'AdminController@tambah_data_event')->name('admin.tambah_data_event');
        Route::get('/detail_event/{event_id}', 'AdminController@event_show')->name('admin.event_show');
        Route::match(['put','patch'],'/detail_event/{event_id}', 'AdminController@event_update')->name('admin.event_update');
        Route::get('/{id}/delete','AdminController@delete_event')->name('admin.delete_event');

        // Data Order
        Route::get('/data_order','AdminController@data_order')->name('admin.order_data');
        Route::get('/data_order/{id}','AdminController@detail_order')->name('admin.detail_order');
        Route::get('/data_order/search','AdminController@search_order')->name('admin.order_search');

        // Status
        Route::get('/status_order','AdminController@status_order')->name('admin.status_order');
        Route::post('/status_order/{id}','AdminController@status_update')->name('admin.status_update');

        // password reset
        Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
        Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    });
