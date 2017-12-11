<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = "cart";

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {

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

    public function delete_item($id)
    {
        $this->totalPrice -= $this->items[$id]['price'];
        $this->totalQty--;
        unset($this->items[$id]);
    }

    public function plus($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] = $this->items[$id]['item']->price * $this->items[$id]['qty'];
        $this->totalPrice += $this->items[$id]['item']->price;
        
    }

    public function subtract($id)
    {
        if ($this->items[$id]['qty'] == 1)
        {
            $this->delete_item($id);
        } else {
            $this->items[$id]['qty']--;
            $this->items[$id]['price'] = $this->items[$id]['item']->price * $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['item']->price;
        }
    }
}
