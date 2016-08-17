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

Route::get('/',"myController@index");
Route::get('/test/{para}',"myController@test");
Route::get('/shop',"myController@shop");
Route::get('/contact-us',"myController@contact_us");
Route::get('/login',"myController@login");
Route::get('/logout',"myController@logout");
Route::get('/single-product',"myController@single_product");
//products頁面呈現DB資料實作對應這個預定義好的路由
Route::get('/products',"myController@products");
Route::get('/products/category',"myController@products_category");
Route::get('/products/brands',"myController@products_brands");
Route::get('/products/details/{id}',"myController@products_details");
Route::get('/blog',"myController@blog");
Route::get('/blog/posts/{id}',"myController@blog_posts");
Route::get('/search/{key-word}',"myController@search");
Route::get('/cart',"myController@cart");
Route::get('/checkout',"myController@checkout");

//dbManipulate test

Route::get('/testcrud/create/{name}-{title}',function($name, $title){
    $product = new \App\Product();
    //逐欄新增
    //    $product->name = "test";
    //    $product->title = "";
    //    $product->description = "";
    //    $product->price = "";
    //    $product->category_id = "";
    //    $product->brand_id = "";
    //    $product->created_at_ip = "";
    //    $product->updated_at_ip = "";
    //儲存變更
    //    $product->save();

    //批次欄位新增，需在Model檔案設定允許批次操作，此方式不需再用save方法儲存
    $product->create(['name'=>$name, 'title'=> $title]);
    
    //新增後重導向到查詢全部資料頁面看是否有新增
    return redirect("/testcrud/read/all");
});

Route::get('/testcrud/read/{id}',function($id){
    //若路由給all則查全部，給id則查指定id
    if($id == 'all'){
        $product = new \App\Product();
        //all方法查詢全部資料，可指定要傳回的欄位
        $product_datas = $product->all(["id","name"]);

        foreach($product_datas as $product_data)
        {
            echo "$product_data->id, $product_data->name <br>";
        }
    }else{
        $product_data = \App\Product::find($id);
        echo "$product_data->id, $product_data->name <br>";
    }

});
Route::get('/testcrud/update/{id}',function($id){
    //::find是透過BaseModel繼承自內建Model的靜態方法，預設是以primarykey搜尋指定目標
    $product = \App\Product::find($id);
    $product->name = "更新測試";
    $product->save();
    //更新後重新導向到read該筆資料的頁面看結果
    return redirect("/testcrud/read/{$id}");

});
Route::get('/testcrud/delete/{id}',function($id){
    $product = \App\Product::find($id);
    //刪除
    $product->delete();
    //刪除後重導向到查詢全部資料頁面看是否已刪除
    return redirect("/testcrud/read/all");

});









