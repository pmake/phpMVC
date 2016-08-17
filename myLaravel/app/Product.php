<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    //設定
    
    //設定對應的資料表，預設對應到和Model名稱相同但開頭為小寫且字尾有s的資料表，以此Model為例就是對應到products資料表
    //protected $table = "products";
    //設定主索引欄位
    //protected $primarykey = "id";
    //設定是否要有時間戳記
    //protected $timestamps = "false";
    //設定可以使用大量指派(以關聯式陣列的方式)方式進行DB操作的欄位，參照routes.php 裡的 dbManipulate test
    protected $fillable = ["name", "title"];
}
