<?php

namespace App\Http\Controllers;

use App\Models\Class\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Exception;

class ProductController extends Controller
{
    function fetchAllProducts()
    {
        try{
            $cacheKey = 'all_products';
            $cacheTTL = 60;
            $products = cache()->remember($cacheKey, $cacheTTL, function () {
                return Product::all();
            });
            return response()->json(['products'=>$products]);
        }catch(Exception $exp){
            return response()->json([
                'error'=>$exp->getMessage()
            ],$exp->getCode());
        }
    }
    
    public function showAllProduct()
    {
        // $products = Product::paginate(10);
        // return view('pages.brand',compact('products'));

        // cache the query
        $cacheKey = 'products_page_' . request()->get('page', 1);
        $cacheTTL = 60; // Cache time-to-live in minutes

        $products = cache()->remember($cacheKey, $cacheTTL, function () {
            // dd("Cache miss for key"); // Just checking the cache query is working or not
            return Product::paginate(10);
        });
        return view('pages.brand', compact('products'));
    }

    public function addTocart(Request $request,$id)
    {
        try{
            $product = Product::findOrFail($id);
            $user = Auth::guard('user')->user();
            $oldCart = null;
            /** @var \App\Models\User $user */
            if(!$user->userCart()->exists()){
                Session::forget($user->id.'_cart');
            }
            if (Session::has($user->id.'_cart')) {
                $oldCart = Session::get($user->id.'_cart');
            } elseif ($user->userCart()->exists()) {
                $oldCart = new Cart(null);
                $existed_cart = json_decode($user->userCart->cart);
                $productIds = array_keys((array) $existed_cart->items);
                $products = Product::whereIn('id', $productIds)->get();
                foreach ($products as $key => $product) {
                    $oldCart->add($product, $product->id);
                }
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
