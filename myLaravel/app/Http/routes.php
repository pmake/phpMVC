<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//改用controller處理需求，格式為 "controller名稱@controller的方法名稱"
Route::get('/', "myController@index");
//設定路由參數，用{}包起來的東西為參數名稱
//會將網址對應的位置轉為參數傳遞給controller，對應的controller方法要有參數可接收
Route::get('/show/{id}', "myController@show");
Route::get('/edit/{id}', "myController@edit");
