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
}