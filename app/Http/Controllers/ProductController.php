<?php

namespace App\Http\Controllers;

use App\Models\Class\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function fetchAllProducts()
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
                'message'=>$exp->getMessage()
            ],404);
        }
    }
    
    public function showAllProduct(Request $request)
    {
        $category = $request->get('category', 'all'); // Default to 'all'
        $currentPage = $request->get('page', 1);

        $cacheKey = "products_page_{$currentPage}_category_{$category}";
        $cacheTTL = 60; // Cache time-to-live in minutes

        $products = cache()->remember($cacheKey, $cacheTTL, function () use ($category) {
            $query = Product::query();

            if ($category !== 'all') {
                $query->where('category', $category);
            }

            return $query->paginate(10);
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
                'message'=>$exp->getMessage()
            ],404);
        }
    }

    public function removeCart($id)
    {
        try{
            $product = Product::findOrFail($id);
            $user = Auth::guard('user')->user();
            $cart = null;
            /** @var \App\Models\User $user */
            if(!$user->userCart()->exists()){
                Session::forget($user->id.'_cart');
            }
            if (Session::has($user->id.'_cart')) {
                $cart = Session::get($user->id.'_cart');
            } elseif ($user->userCart()->exists()) {
                $cart = new Cart(null);
                $existed_cart = json_decode($user->userCart->cart);
                $productIds = array_keys((array) $existed_cart->items);
                $products = Product::whereIn('id', $productIds)->get();
                foreach ($products as $key => $product) {
                    $cart->add($product, $product->id);
                }
            }
            if($cart)
                $cart->reduceByOne($id);
            $finalCart = new Cart($cart);
            foreach($finalCart->items as $key => $value){
                if (isset($finalCart->items[$key]['item'])) {
                    unset($finalCart->items[$key]['item']);
                }
            }
            $user->userCart()->update([
                'cart' => json_encode($finalCart)
            ]);
            return response()->json(['cart'=>$cart]);
        }catch(Exception $exp){
            return response()->json([
                'message'=>$exp->getMessage()
            ],404);
        }
    }
}
