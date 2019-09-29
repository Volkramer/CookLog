<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingListContent extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function shoppingList()
    {
        return $this->belongsTo('App\ShoppingList');
    }
}
