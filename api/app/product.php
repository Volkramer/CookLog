<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function shoppingListContents()
    {
        return $this->belongsToMany('App\ShoppingListContent');
    }

    public function stockContents()
    {
        return $this->belongsToMany('App\StockContent');
    }
}
