<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 获取用户列表
Route::any('/user', function (Request $request) {
    $url = route('a_long_path', ['username' => 'summertzz', 'pwd' => 'lsbbd']);

    return [
        'path' => $url,
        'named' => $request->route()->named('a_long_path')
    ];
});

// 获取单个用户信息
Route::get('/user/{id}', function (Request $request) {

});


Route::get('user/{username}/register/{pwd}', function(Request $request) {
    return [
        $request->route()->named('a_long_path')

    ];
})->name('a_long_path');

Route::middleware('auti:api', 'throttle: 3,1')->group(function() {
    Route::get('/User/{name}', function($name) {
        return $name;
    });
});

// 添加用户信息
Route::post('/user', function (Request $request) {

});

// 修改用户信息
Route::put('/user', function (Request $request) {

});

// 删除用户信息
Route::delete('/user', function (Request $request) {

});
