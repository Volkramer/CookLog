<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function getProductByCode($slug, $full = null)
    {
        if ($full === "full") {
            return DB::connection('mongodb')->collection('products')->where('code', $slug)->first();
        } else {
            return new ProductResource(DB::connection('mongodb')->collection('products')->where('code', $slug)->first());
        }
    }

    public function findProduct($slug, $full = null)
    {
        if ($full === "full") {
            return DB::connection('mongodb')->collection('products')
                ->where('product_name', 'regexp', '/.*' . $slug . '/i')
                ->limit(10)
                ->get();
        } else {
            return new ProductCollection(
                DB::connection('mongodb')->collection('products')
                    ->where('product_name', 'regexp', '/.*' . $slug . '/i')
                    ->limit(10)
                    ->get()
            );
        }
    }
}
