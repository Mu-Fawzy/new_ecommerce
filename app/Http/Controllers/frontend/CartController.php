<?php

namespace App\Http\Controllers\frontend;

use App\CustomClasses\Cart;
use App\Http\Controllers\Controller;
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
}
