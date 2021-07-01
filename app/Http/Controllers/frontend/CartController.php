<?php

namespace App\Http\Controllers\frontend;

use App\CustomClasses\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        }else {
            $cart = null;
        }
        return view('frontend.cart', compact('cart'));
    }

    public function update(Request $request, Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($request, $product);

        session()->put('cart', $cart);
        return redirect()->route('cart');
    }


    public function delete(Request $request, Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->delete($request, $product);

        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        }else {
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }
}
