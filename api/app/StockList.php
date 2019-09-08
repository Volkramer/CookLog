<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockList extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function stockContents()
    {
        return $this->hasMany('App\StockContent');
    }
}
