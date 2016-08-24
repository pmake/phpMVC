<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socialite_user extends BaseModel
{
    protected $fillable = [
        'vendor', "vendor_user_id",'user_id'
    ];

    public function user()
    {
        //建立與users資料表(User ORM對應到的是users資料表)的關聯
        return $this->belongsTo(User::class);
    }
}
