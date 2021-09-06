<?php

namespace App;

use Illuminate\Http\Request;

class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct(Request $request)
        //constructor to set all values
    {
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
        $this->save();
    }

    public function save() {
        //function to save everything
        session()->put('cart', $this);
    }

    public function add($item, $id)
        //function where an item gets added to the cart
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id)
        //function where an item is getting reduced by one
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
        $this->save();
    }

    public function addByOne($id)
        //function where an item is getting reduced by one
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
        $this->save();
    }

    public function removeItem($id)
        //function where an item is getting removed completely
    {
        $this->totalQty -= $this->items[$id] ['qty'];
        $this->totalPrice -= $this->items[$id] ['price'];
        unset($this->items[$id]);
        $this->save();
    }
}