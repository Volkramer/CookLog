<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockListItem extends Model
{
    public function products()
    {
        return $this->hasOne('App\Product');
    }

    public function stockList()
    {
        return $this->belongsTo('App\StockList');
    }
}
