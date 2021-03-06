<?php

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('index');
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
        return view('internals/index');
    });

    // 成本估算
    Route::get('/internals/cost-estimate', function () {
        $path = Request::path();

        return $path;
    });

    // 工料分析
    Route::group(['prefix' => '/internals/quantity-analysis'], function () {
        Route::post('/search', 'QuantityAnalysisController@search');
        Route::get('/search/{target?}', 'QuantityAnalysisController@doSearch');
    });
    Route::resource('/internals/quantity-analysis', 'QuantityAnalysisController');

    // 合約管理
    Route::get('/internals/contract-management', function () {
        $path = Request::path();

        return $path;
    });

    Route::get('/settings', function () {
        return view('settings/index');
    });

    Route::resource('/settings/works/types', 'SettingsWorksController@types');
    Route::resource('/settings/works/orders', 'SettingsWorksController@orders');
    Route::resource('/settings/works/units', 'SettingsWorksController@units');
    Route::resource('/settings/works', 'SettingsWorksController');
    Route::resource('/settings/self-check', 'SettingsSelfCheckController');
    Route::resource('/self-check', 'SelfCheckController');

    // 設定/協力廠商
    Route::resource('/settings/subcontractors', 'SettingsSubcontractorsController');
});

// 會員管理
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
