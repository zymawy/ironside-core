<?php

    /*
    |------------------------------------------
    | Dashboard (when authorized and admin)
    |------------------------------------------
    */
    Route::group(['middleware' => 'localizer'], function () {
    Route::prefix('dashboard')->namespace('Dashboard')->middleware('auth')->group(function () {


            Route::get('/', 'DashboardController@index')->name('admin');

            // profile
            Route::get('/profile', 'ProfileController@index');
            Route::put('/profile/{user}', 'ProfileController@update');

            // analytics
            Route::group(['prefix' => 'analytics'], function () {
                Route::get('/', 'AnalyticsController@summary');
                Route::get('/devices', 'AnalyticsController@devices');
                Route::get('/visits-and-referrals', 'AnalyticsController@visitsReferrals');
                Route::get('/interests', 'AnalyticsController@interests');
                Route::get('/demographics', 'AnalyticsController@demographics');
            });

            // history
            Route::group(['prefix' => 'latest-activity', 'namespace' => 'History'], function () {
                Route::get('/', 'HistoryController@website');
                Route::get('/dashboard', 'HistoryController@admin');
                Route::get('/website', 'HistoryController@website');
            });

            // general
            Route::group(['prefix' => 'general', 'namespace' => 'General'], function () {
                Route::resource('tags', 'TagsController');

                Route::get('/banners/order', 'BannersOrderController@index');
                Route::post('/banners/order', 'BannersOrderController@update');
                Route::resource('banners', 'BannersController');
            });

            // pages order
            Route::group(['prefix' => 'pages', 'namespace' => 'Pages'], function () {
                Route::get('/order/{type?}', 'OrderController@index');
                Route::post('/order/{type?}', 'OrderController@updateOrder');

                // manage page sections list order
                Route::get('/{page}/sections', 'PageContentController@index');
                Route::post('/{page}/sections/order', 'PageContentController@updateOrder');
                Route::delete('/{page}/sections/{section}', 'PageContentController@destroy');

                // page components
                Route::resource('/{page}/sections/content', 'PageContentController');
            });
            Route::resource('pages', 'Pages\PagesController');

            // blog
            Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () {
                Route::get('/', function () {
                    return redirect('/dashboard/blog/articles');
                });
                Route::resource('categories', 'CategoriesController');
                Route::resource('articles', 'ArticlesController');
            });

            // news and events
            Route::group(['prefix' => 'news-and-events', 'namespace' => 'NewsEvents'], function () {
                Route::resource('news', 'NewsController');
                Route::resource('categories', 'CategoriesController');
            });

            // gallery / photos
            Route::group(['prefix' => 'photos', 'namespace' => 'Photos'], function () {
                Route::get('/', 'PhotosController@index');
                Route::delete('/{photo}', 'PhotosController@destroy');
                Route::post('/upload', 'PhotosController@uploadPhotos');
                Route::post('/{photo}/edit/name', 'PhotosController@updatePhotoName');
                Route::post('/{photo}/cover', 'PhotosController@updatePhotoCover');

                // photoables
                Route::get('/news/{news}', 'PhotosController@showNewsPhotos');
                Route::get('/articles/{article}', 'PhotosController@showArticlePhotos');

                Route::resource('/albums', 'AlbumsController', ['except' => 'show']);
                Route::get('/albums/{album}', 'PhotosController@showAlbumPhotos');

                // croppers
                Route::post('/crop/{photo}', 'CropperController@cropPhoto');
                Route::get('/news/{news}/crop/{photo}', 'CropperController@showNewsPhoto');
                Route::get('/albums/{album}/crop/{photo}', 'CropperController@showAlbumsPhoto');
                Route::get('/articles/{article}/crop/{photo}', 'CropperController@showArticlesPhoto');

                // resource image crop
                Route::post('/crop-resource', 'CropResourceController@cropPhoto');
                Route::get('/banners/{banner}/crop-resource/', 'CropResourceController@showBanner');
            });

            // accounts
            Route::group(['prefix' => 'accounts', 'namespace' => 'Accounts'], function () {
                // clients
                Route::post('clients/filter', 'ClientsController@filter');
                Route::resource('clients', 'ClientsController')->parameters([
                    'clients' => 'user'
                ]);
                Route::post('clients/{user}/notify/forgot-password',
                    'ClientsController@sendResetLinkEmail');

                // users
                Route::get('administrators/invites', 'AdministratorsController@showInvites');
                Route::post('administrators/invites', 'AdministratorsController@postInvite');
                Route::resource('administrators', 'AdministratorsController');
            });

            // corporate
            Route::group(['prefix' => 'newsletter', 'namespace' => 'Newsletter'], function () {
                Route::resource('subscribers', 'SubscribersController');
            });

            // documents
            Route::group(['prefix' => 'documents', 'namespace' => 'Documents'], function () {
                // documents
                Route::get('/', 'DocumentsController@index');
                Route::delete('/{document}', 'DocumentsController@destroy');
                Route::post('/upload', 'DocumentsController@upload');
                Route::post('/{document}/edit/name', 'DocumentsController@updateName');

                // documentable
                Route::get('/category/{category}', 'DocumentsController@showCategory');

                // categories
                Route::resource('/categories', 'CategoriesController');
            });

            // reports
            Route::group(['prefix' => 'reports', 'namespace' => 'Reports'], function () {
                Route::get('summary', 'SummaryController@index');

                // feedback contact us
                // Route::get('contact-us', 'ContactUsController@index');
                // Route::post('contact-us/chart', 'ContactUsController@getChartData');
                // Route::get('contact-us/datatable', 'ContactUsController@getTableData');
            });

            Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function () {
                Route::resource('roles', 'RolesController');

                // settings
                Route::resource('settings', 'SettingsController');

                // navigation
                Route::get('navigation/order', 'NavigationOrderController@index');
                Route::post('navigation/order', 'NavigationOrderController@updateOrder');
                Route::get('navigation/datatable', 'NavigationController@getTableData');
                Route::resource('navigation', 'NavigationController');
            });
        });
      });
