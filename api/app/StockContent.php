<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockContent extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function stockList()
    {
        return $this->belongsTo('App\StockList');
    }
}
