<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class myController extends Controller
{
    //定義公用變數
    var $products;
    var $categories;
    var $brands;

    //定義建構子，執行初始化動作為取得資料庫資料儲存於公用變數
    public function __construct(){
        $this->products = \App\Product::all(["id", "name", "price"]);
        $this->categories = \App\Category::all(["name"]);
        $this->brands = \App\Brand::all(["name"]);
    }

    //在這新增對應路由的方法

    //參數傳遞測試
    public function test($paraReceiver)
    {
        return view("test", ["argu"=>$paraReceiver]);
    }

    //正式
    public function shop()
    {
        return view("shop", ["title"=>"Shop Page"]);
    }
    public function checkout()
    {
        return view("checkout", ["title"=>"Checkout"]);
    }

    public function products()
    {
        return view("products", ["title"=>"Products", "products"=>$this->products]);
    }

    public function single_product()
    {
        return view("single-product", ["title"=>"Single Product"]);
    }
    public function cart()
    {
        return view("cart", ["title"=>"Cart"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index", ["title"=>"Home"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
