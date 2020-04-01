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
//
Route::get('/', function () {
    return view('Index/index');
});

Route::get('login/register','login\LoginController@register');//注册
Route::post('login/registerto','login\LoginController@registerto');//注册成功
Route::get('login/login','login\LoginController@login');//登录
Route::post('login/loginto','login\LoginController@loginto');//登录成功
Route::any('Index/index','login\IndexController@index');//首页
Route::get('login/code','login\LoginController@code');//扫码登录
Route::get('login/codeto','login\LoginController@codeto');
