<?php

namespace App\CustomClasses;

class Cart
{
    public $items = [],
        $totalQty,
        $totalPrice;

    public function __construct($cart = null) {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQty = $cart->totalQty;
        }else {
            $this->items = [];
            $this->totalPrice = 0;
            $this->totalQty = 0;
        }
    }

    public function add($product)
    {
        $item = [
            'title' => $product->title,
            'qty'   => 0,
            'price' => $product->price,
            'image' => $product->image,
        ];

        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;
            $this->totalQty += 1;
            $this->totalPrice += $product->price;
        }else {
            $this->totalQty += 1;
            $this->totalPrice += $product->price;
        }

        $this->items[$product->id]['qty'] += 1;
    }

    public function updateQty($request, $product)
    {
        $this->totalQty -= $this->items[$product->id]['qty'];
        $this->totalPrice -= $this->items[$product->id]['price'] * $this->items[$product->id]['qty'];

        $this->items[$product->id]['qty'] = $request->qty;

        $this->totalQty += $request->qty;
        $this->totalPrice += $this->items[$product->id]['price'] * $request->qty;
    }

    public function delete($request, $product)
    {
        if (array_key_exists($product->id, $this->items)) {
            $this->totalQty -= $this->items[$product->id]['qty'];
            $this->totalPrice -= $this->items[$product->id]['price'] * $this->items[$product->id]['qty'];
            unset($this->items[$product->id]);
        }
    }
}