<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return response()->json($cart);
    }

    public function add(AddToCartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        $color = $request->color ?? 'default';
        $size = $request->size ?? 'default';
        $quantity = $request->quantity ?? 1;

        $cart = session()->get('cart', []);
        $key = $product->id . '-' . $color . '-' . $size;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $quantity;
        } else{
            $cart[$key] = [
            'product_id' => $product->id,
            'name' => $product->name,
            'color' => $color,
            'size' => $size,
            'quantity' => $quantity,

            ];
        }

        session()->put('cart', $cart);
        return response()->json([
            'message'=> 'محصول به سبذ خرید اضافه شد',
            'cart' => $cart
        ]);

    }

    public function remove($key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])){
            unset($cart[$key]);

            session()->put('cart', $cart);
        }

        return response()->json([
           'message'=> 'محصول حذف شد',
            'cart' => $cart
        ]);
    }

    public function clear()
    {
        session()->forget('cart');

        return response()->json([
           'message'=> 'سبد خرید خالی شد'
        ]);
    }




}
