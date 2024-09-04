<?php

namespace App\Http\Controllers;

use App\Models\Class\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function showAllProduct()
    {
        $products = Product::paginate(10);
        return view('pages.brand',compact('products'));
    }

    public function addTocart(Request $request, $id){
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::has('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart',$cart);
    }
}
