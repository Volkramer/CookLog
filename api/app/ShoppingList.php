<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shoppingListItems()
    {
        return $this->hasMany('App\ShoppingListItem');
    }
}
