<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;

use ShoppingCart;

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
        return view("shop", ["title"=>"Shop Page", "description"=>"網頁說明"]);
    }
    public function checkout()
    {
        return view("checkout", ["title"=>"Checkout", "description"=>"網頁說明"]);
    }

    public function products()
    {
        return view("products", ["title"=>"Products", "description"=>"網頁說明", "products"=>$this->products]);
    }

    public function single_product()
    {
        return view("single-product", ["title"=>"Single Product", "description"=>"網頁說明"]);
    }
    public function cart()
    {
        return view("cart", ["title"=>"Cart", "description"=>"網頁說明", "cart"=>ShoppingCart::content()]);
    }
    public function cart_add(Request $request)
    {
        $product_id = Request::get('product_id');
        //post方法的request處理，$request->isMethod('post')用來判斷路由來源是否使用POST方法
        if(Request::isMethod('post')){

            $product = \App\Product::find($product_id);

            ShoppingCart::add(['id' => $product->id,
                               'name'=> $product->name,
                               'qty'=> 1,
                               'price'=> $product->price]);

            //處理完ADD to cart需求後重新導向回products頁面
            return redirect('/products');
        }else {

            if( Request::get("add") == 1)
            {
                $items = ShoppingCart::Search(function ($cartItem, $rowId) { return $cartItem->id == Request::get('product_id');});
                ShoppingCart::update($items->first()->rowId, $items->first()->qty + 1);
            }

            if( Request::get("minus") == 1)
            {
                $items =ShoppingCart::Search(function ($cartItem, $rowId) { return $cartItem->id == Request::get('product_id');});
                ShoppingCart::update($items->first()->rowId, $items->first()->qty - 1);
            }
            return redirect('/cart');
        }
        //redirect方法可附加資料，例如要將ShoppingCart內容傳遞過去，可以使用with方法，傳遞過去的參數可以使用{{session('cart')}}取得資料
        //$cart = ShoppingCart::content();
        //return redirect('/products')->with('cart', $cart);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index", ["title"=>"Home", "description"=>"網頁說明"]);
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
