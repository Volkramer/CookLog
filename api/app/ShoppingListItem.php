<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingListItem extends Model
{
    public function products()
    {
        return $this->hasOne('App\Product');
    }

    public function shoppingList()
    {
        return $this->belongsTo('App\ShoppingList');
    }
}
