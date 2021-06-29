<?php

namespace App\Http\Controllers\frontend;

use App\CustomClasses\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('frontend.store', compact('products'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('frontend.single-product', compact('product'));
    }

    public function addProduct(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        }else {
            $cart = new Cart();
        }

        $cart->add($product);
        session()->put('cart', $cart);
        return redirect()->back();
    }

}
