<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verify;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SendVerificationMail;
use App\Models\Class\Cart;
use App\Models\Product;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('pages.customer.auth.signup');
    }

    public function getLogin()
    {
        return view('pages.customer.auth.login');
    }
    public function getResetPassword()
    {
        return view('pages.customer.auth.reset-password');
    }
    public function getUserAddress()
    {
        return view('pages.customer.user-address');
    }
    public function getCartItem()
    {
        $user = Auth::guard('user')->user();
        /** @var \App\Models\User $user */
        if ($user->userCart()->exists()) {
            $oldCart = new Cart(null);
            $existed_cart = json_decode($user->userCart->cart);
            $productIds = array_keys((array) $existed_cart->items);
            $products = Product::whereIn('id', $productIds)->get();
            foreach ($products as $key => $product) {
                $qty = $existed_cart->items->{$product->id}->qty;
                $oldCart->add($product, $product['id'], $qty);
            }
            Session::put($user->id . '_cart', $oldCart);
        }
    }

    function generateRandomString($length = 4)
    {
        // Define the characters to choose from: digits and letters
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        // Generate the random string
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = random_int(0, $charactersLength - 1);
            $randomString .= $characters[$randomIndex];
        }

        return $randomString;
    }
    public function signup(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required|digits:11',
                'email' => 'email|required|unique:users',
                'password' => 'required|min:4'
            ]);
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                throw new Exception("User found");
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->save();
            // Auth::login($user);
            // Auth::guard('user')->login($user);

            return ['status' => 1];
        } catch (Exception $exp) {
            return response()->json([
                'error' => $exp->getMessage(),
            ]);
        }
    }

    public function login(Request $request)
    {
        try {
            if (filter_var($request->emailPhone, FILTER_VALIDATE_EMAIL)) {
                if (Auth::guard('user')->attempt(['email' => $request->emailPhone, 'password' => $request->password])) {
                    $this->getCartItem();
                    return redirect()->route('home');
                }
            } else {
                if (Auth::guard('user')->attempt(['phone' => $request->emailPhone, 'password' => $request->password])) {
                    $this->getCartItem();
                    return redirect()->route('home');
                }
            }
            throw new Exception("Invalid Email & Password");
        } catch (Exception $exp) {
            return response()->json([
                'error' => $exp->getMessage(),
            ], 404);
        }
    }

    function verifyOTP(Request $request)
    {
        try {
            $user = User::where('phone', $request->phone)->first();
            if (!$user) {
                throw new Exception("User Not found");
            }
            $user->verification = 1;
            $user->save();
            Auth::guard('user')->login($user);
            return redirect()->route('home');
        } catch (Exception $exp) {
            return response()->json([
                'error' => $exp->getMessage(),
            ], 404);
        }
    }

    public function logout()
    {
        $user = Auth::guard('user')->user();
        Session::forget($user->id . '_cart');
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }

    // Send verification code for reset password
    public function resetPasswordEmail(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                throw new Exception("User Not found");
            }
            $code = new Verify();
            $code->code = $this->generateRandomString();
            // Mail::to($user->email)->send(new SendVerificationMail($code));
            if ($user->userVerification()->exists()) {
                $user->userVerification()->update(['code' => $code->code]);
            } else {
                $user->userVerification()->save($code);
            }
            return response()->json(['user' => $user, 'code' => $code]);
        } catch (Exception $exp) {
            return response()->json([
                'error' => $exp->getMessage(),
            ], 404);
        }
    }

    // Check verification code
    public function resetPasswordCode(Request $request)
    {
        try {
            // It has problem for case sensitive
            // $user = User::with(['userVerification' => function($query) use ($request) {
            //     $query->where('code', $request->code);
            // }])->where('email', $request->email)->first();
            $user = User::with('userVerification')->where('email', $request->email)->first();

            if (!$user) {
                throw new Exception("User Not found");
            }
            if ($user->userVerification->code !== $request->code) {
                throw new Exception("Invalid Code");
            }
            return response()->json(['data' => $user]);
        } catch (Exception $exp) {
            return response()->json([
                'error' => $exp->getMessage()
            ], 404);
        }
    }

    // Reset the password
    public function resetPassword(Request $request)
    {
        try {
            $user = User::with('userVerification')->where('email', $request->email)->first();

            if (!$user) {
                throw new Exception("User Not found");
            }
            $user->userVerification->delete();
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['data' => $user]);
        } catch (Exception $exp) {
            return response()->json(['error' => $exp->getMessage()], 404);
        }
    }

    // Show user cart product
    public function showUserCart()
    {
        $user = Auth::guard('user')->user();
        $id = $user->id;
        /** @var \App\Models\User $user */
        if ($user->userCart()->exists()) {
            if (Session::get($id . '_cart')) {
                $carts = new Cart(Session::get($id . '_cart'));
                $existed_cart = json_decode(Auth::guard('user')->user()->userCart->cart);
                if ($carts->totalQty !== $existed_cart->totalQty) {
                    Session::forget($id . '_cart');
                    $carts = new Cart(null);
                    $productIds = array_keys((array) $existed_cart->items);
                    $products = Product::whereIn('id', $productIds)->get();
                    foreach ($products as $key => $product) {
                        $qty = $existed_cart->items->{$product->id}->qty;
                        $carts->add($product, $product['id'], $qty);
                    }
                    Session::put($id . '_cart', $carts);
                }
            } else {
                $carts = new Cart(null);
                $existed_cart = json_decode(Auth::guard('user')->user()->userCart->cart);
                $existingItems = $existed_cart->items;
                $productIds = array_keys((array) $existingItems);
                $products = Product::whereIn('id', $productIds)->get();
                foreach ($products as $product) {
                    $productId = $product->id;
                    if (property_exists($existingItems, $productId)) {
                        $quantity = $existingItems->$productId->qty;
                        $carts->add($product, $productId, $quantity);
                    }
                }
                if (Session::has($id . '_cart')) {
                    Session::forget($id . '_cart');
                }
            }
        }else{
            $carts = new Cart(null);
            if (Session::has($id . '_cart')) {
                Session::forget($id . '_cart');
            }
        }
        $address=$user->userAddress;
        if(!$address){
            $address=null;
        }
        return view('pages.customer.cart.user-cart', ['carts'=>$carts,'address'=>$address]);
    }
}
