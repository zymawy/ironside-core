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

/*
|------------------------------------------
| Localization
|------------------------------------------
*/
Route::group(['middleware' => 'localizer'], function () {

    /*
|------------------------------------------
| Website
|------------------------------------------
*/
    Route::redirect('/home', '/');
    // Route::group(['namespace' => 'Website'], function () {
    //     Route::get('/', 'HomeController@index');
    //     // Route::get('/contact-us', 'ContactUsController@index');
    //     // Route::post('/contact-us/submit', 'ContactUsController@feedback');

    //     // gallery
    //     Route::get('/gallery', 'GalleryController@index');
    //     Route::get('/gallery/{albumSlug}', 'GalleryController@showAlbum');

    //     // blog / articles
    //     Route::get('/blog', 'BlogController@index');
    //     Route::get('/blog/{articleSlug}', 'BlogController@show');

    //     // news and events
    //     Route::get('/news-and-events', 'NewsEventController@index');
    //     Route::get('/news-and-events/{newsSlug}', 'NewsEventController@show');
    // });

    /*
    |------------------------------------------
    | Website Account
    |------------------------------------------
    */
    // Route::group(['middleware' => ['auth'], 'prefix' => 'account', 'namespace' => 'Website\Account'],
    //     function () {
    //         Route::get('/', 'AccountController@index')->name('account');
    //         Route::get('/profile', 'ProfileController@index')->name('profile');
    //         Route::post('/profile', 'ProfileController@update');
    //     });

    // /*
    // |------------------------------------------
    // | Authenticate User
    // |------------------------------------------
    // */
    // Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    //     // logout (get or post)
    //     Route::any('logout', 'LoginController@logout')->name('logout');

    //     Route::group(['middleware' => 'guest'], function () {
    //         // login
    //         Route::get('login', 'LoginController@showLoginForm')->name('login');
    //         Route::post('login', 'LoginController@login');

    //         // registration
    //         Route::get('register/{token?}', 'RegisterController@showRegistrationForm')
    //             ->name('register');
    //         Route::post('register', 'RegisterController@register');
    //         Route::get('register/confirm/{token}', 'RegisterController@confirmAccount');

    //         // password reset
    //         Route::get('password/forgot', 'ForgotPasswordController@showLinkRequestForm')
    //             ->name('forgot-password');
    //         Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    //         Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')
    //             ->name('password.reset');
    //         Route::post('password/reset', 'ResetPasswordController@reset');
    //     });
    // });


    /*
    |--------------------------------------------------------------------------
    | AJAX ROUTES
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax', 'middleware' => 'web'], function () {
        // logs
        Route::group(['prefix' => 'log'], function () {
//            Route::post('social-media', 'LogsController@socialMedia');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Website Dynamic Pages
    |--------------------------------------------------------------------------
    // */
    // Route::group(['namespace' => 'Website'], function () {
    //     Route::get('{slug1}/{slug2?}/{slug3?}', 'PagesController@index');
    // });

});

