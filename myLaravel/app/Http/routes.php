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
    return view('task');
});
//新增請求處理
Route::post('/task', function(Request $request){
    //新增內建的驗證器做資料驗證
    $validateResult = Validator::make($request->all(), ["name" => "required|max:15"]);
    if($validateResult->fails()){
        return "資料錯誤!";
    }
    $task = new Task();
    $task->name = $request->name;
    $task->save();
    return "success";
});
//刪除請求處理
Route::delete('/task/{id}', function(Task $task){
    //
});