<?php

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        $path = Request::path();

        return view('index', compact('path'));
    });

    // 專案管理
    Route::group(['prefix' => '/projects'], function () {
        // 專案查詢
        Route::get('/search/{target?}', 'ProjectsController@doSearch');
        Route::post('/search', 'ProjectsController@search');
    });
    Route::resource('/projects', 'ProjectsController');

    // 內部作業
    Route::get('/internals', function () {
        $path = Request::path();

        return view('internals/index', compact('path'));
    });

    // 成本估算
    Route::get('/internals/cost-estimate', function () {
        $path = Request::path();

        return $path;
    });

    // 工料分析
    Route::get('/internals/quantity-analysis', function () {
        $path = Request::path();

        return $path;
    });

    // 合約管理
    Route::get('/internals/contract-management', function () {
        $path = Request::path();

        return $path;
    });

});

// 會員管理
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
