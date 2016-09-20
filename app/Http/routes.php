<?php
// 首页直接跳转到后台
Route::get('/admin', function () {
    return redirect()->route('admin.index');
});
// 首页直接跳转到后台
Route::get('/', function () {
    return redirect()->route('index');
});
// 后台路由组
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>'web'], function () {
    // 登录
    Route::get('login', 'AuthController@login')->name('admin.login');
    Route::post('login', 'AuthController@postLogin');
    // 注销
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
    // 已经登录
    Route::group(['middleware' => ['admin.auth','role.auth:admin']], function () {
        // 后台首页
        Route::get('/', 'AdminController@index')->name('admin.index.index');
        // 后台权限节点
        Route::any('permission/index', 'PermissionController@index')->name('admin.permission.index');
        Route::post('permission/store', 'PermissionController@store')->name('admin.permission.store');
        Route::resource('permission','PermissionController');
        // 后台角色
        Route::any('role/index', 'RoleController@index')->name('admin.role.index');
        Route::post('role/store', 'RoleController@store')->name('admin.role.store');
        Route::post('role/permission', 'RoleController@permission')->name('admin.role.permission');
        Route::resource('role','RoleController');
        // 管理员
        Route::any('user/index', 'UserController@index')->name('admin.user.index');
        Route::post('user/store', 'UserController@store')->name('admin.user.store');
        Route::post('user/role', 'UserController@role')->name('admin.user.role');
        Route::resource('user','UserController');
    });
});

// pc端路由组
Route::group(['namespace' => 'Home', 'middleware'=>'web'], function () {

    Route::get('/', 'IndexController@index')->name('index');

});

