<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socialite_user extends BaseModel
{
    protected $fillable = [
        'vendor', 'user_id',
    ];
}
