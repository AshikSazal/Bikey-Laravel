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

    public function addTocart(Request $request,$id)
    {
        try{
            $product = Product::findOrFail($id);
            $user = Auth::guard('user')->user();
            $oldCart = null;
            if(!$user->userCart()->exists()){
                Session::forget($user->id.'_cart');
            }
            if (Session::has($user->id.'_cart')) {
                $oldCart = Session::get($user->id.'_cart');
            } elseif ($user->userCart()->exists()) {
                $oldCart = json_decode($user->userCart->cart);
            }
            $cart = new Cart($oldCart);
            $cart->add($product, $id);
            Session::put($user->id.'_cart',$cart);
            $finalCart = new Cart($cart);
            foreach($finalCart->items as $key => $value){
                if (isset($finalCart->items[$key]['item'])) {
                    unset($finalCart->items[$key]['item']);
                }
            }
            if ($user->userCart()->exists()) {
                $user->userCart()->update([
                    'cart' => json_encode($finalCart)
                ]);
            } else {
                $user->userCart()->create([
                    'cart' => json_encode($finalCart)
                ]);
            }
            return response()->json(['cart'=>$cart]);
        }catch(Exception $exp){
            return response()->json([
                'error'=>$exp->getMessage()
            ],$exp->getCode());
        }
    }
}
