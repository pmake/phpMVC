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

use App\Task;
use Illuminate\Http\Request;

//顯示請求處理
Route::get('/', function () {
    //return view('welcome');
});
//新增請求處理
Route::post('/task', function(Request $request){
    //
});
//刪除請求處理
Route::delete('/task/{task}', function(Task $task){
    //
});