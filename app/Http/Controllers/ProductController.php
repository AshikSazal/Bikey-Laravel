<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showAllProduct()
    {
        $products = Product::all();
        return view('pages.brand',compact('products'));
    }
}
