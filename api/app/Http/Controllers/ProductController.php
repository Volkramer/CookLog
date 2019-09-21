<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProductByCode($slug)
    {
        return DB::connection('mongodb')->collection('products')->where('code', $slug)->first();
    }

    public function findProduct($slug)
    {
        return DB::connection('mongodb')->collection('products')
            ->where('code', $slug)
            ->orwhere('product_name', $slug)
            ->limit(10)
            ->get();
    }
}
