<?php
// 首页直接跳转到后台
Route::get('/admin', function () {
    return redirect()->route('admin.index');
});
// 直接跳转到登录
Route::get('/login', function () {
    return redirect()->route('admin.login');
});

// 首页直接跳转到后台
Route::get('/', function () {
    return redirect()->route('index');
});
// 后台路由组
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>'web'], function () {
    // // 登录
    Route::get('login', 'AuthController@login')->name('admin.login');
    Route::post('login', 'AuthController@postLogin');
    // // 注销
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
    // // 已经登录
    Route::group(['middleware' => ['admin.auth']], function () {
        // 后台首页
        Route::get('/', 'AdminController@index')->name('admin.index');
        // 后台权限节点
        Route::get('permission/index', 'PermissionController@index')->name('permission.index');
        Route::get('permission/create', 'PermissionController@create')->name('permission.create');
        Route::post('permission/store', 'PermissionController@store')->name('permission.store');
    });
});

// pc端路由组
Route::group(['namespace' => 'Home', 'middleware'=>'web'], function () {

    Route::get('/', 'IndexController@index')->name('index');

});

