<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function getProductByCode($slug, $full = null)
    {
        if ($full === "full") {
            return DB::connection('mongodb')->collection('products')->where('code', $slug)->first();
        } elseif ($full === null) {
            return new ProductCollection(DB::connection('mongodb')->collection('products')->where('code', $slug)->first());
        }
    }

    public function findProduct($slug, $full = null)
    {
        if ($full === "full") {
            return DB::connection('mongodb')->collection('products')
                ->where('code', $slug)
                ->orwhere('product_name', $slug)
                ->limit(10)
                ->get();
        } elseif ($full === null) {
            return new ProductCollection(
                DB::connection('mongodb')->collection('products')
                    ->where('code', $slug)
                    ->orwhere('product_name', $slug)
                    ->limit(10)
                    ->get()
            );
        }
    }
}
