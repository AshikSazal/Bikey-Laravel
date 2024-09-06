<?php

namespace App\Http\Controllers;

use App\Models\Class\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;

class ProductController extends Controller
{
    public function showAllProduct()
    {
        $products = Product::paginate(10);
        return view('pages.brand',compact('products'));
    }

    public function addTocart(Request $request){
        try{
            $product = Product::findOrFail($request->id);
            $user = Auth::gurad('user')->user;
            $oldCart = null;
            if (Session::has($user->id.'_cart')) {
                $oldCart = Session::get($user->id.'_cart');
            } elseif ($user->userCart()->exists()) {
                $oldCart = json_decode($user->userCart);
            }
            $cart = new Cart($oldCart);
            $cart->add($product, $request->id);
            Session::put($user->id.'_cart',$cart);
            $user->userCart()->update($cart);
            return response()->json(['cart'=>$cart]);
        }catch(Exception $exp){
            return response()->json([
                'error'=>$exp->getMessage()
            ],$exp->getCode());
        }
    }
}
