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
    $tasks = Task::orderBy('created_at','asc')->get();
    //return view('welcome');
    return view('task', ["tasks"=>$tasks]);
    //view()的第二個參數傳遞的陣列內容會以索引名稱轉換成對應的變數名稱並將該索引的值存入
});
//新增請求處理
Route::post('/task', function(Request $request){
    //新增內建的驗證器做資料驗證
    $validateResult = Validator::make($request->all(), ["name" => "required|max:15"]);
    //判斷是否含有錯誤
    if($validateResult->fails()){
        //重導向回首頁並加入錯誤訊息，重新導回'/'是回到
        return redirect("//")
            ->withInput()
            ->withErrors($validateResult);
        //withErrors方法傳遞的內容會放到@errors變數中
    }
    $task = new Task();
    $task->name = $request->name;
    $task->save();
    return 'success';
});
//刪除請求處理
Route::delete('/task/{id}', function(Task $task){
    //
});