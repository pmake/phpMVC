<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function selectQuery($queryString){
        return DB::select($queryString);
    }
    
    public function selectStatement($queryStatement){
        return DB::statement($queryStatement);
    }
}
