<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shoppingListContents()
    {
        return $this->hasMany('App\ShoppingListContent');
    }
}
