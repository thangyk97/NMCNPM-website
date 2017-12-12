<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Session;

class JsonController extends Controller
{
    /**
     * Get all orders to app java
     * Return: json string
     */
    public function getOrders() 
    {
        $orders = Order::all()->first();

        $ordersArray = $orders->toArray();

        echo json_encode($ordersArray);        
    }

    public function getCart() 
    {
        $orders = Order::where('status', 'waiting')->get();

        $result = array();

        $cart = array();

        foreach ($orders as $order)
        {

            $carts = DB::table('cart')->get()->where('id_order', $order['id']);

            $cart_of_order = array();

            foreach ($carts as $cart)
            {
                $product = Product::where('id', $cart->id_product)->get()->first();

                $content = array("id"=>$product['id'], "name"=>$product['name'], "price"=>$product['price'], "amount"=>$cart->amount,);

                $cart_of_order[] = $content;
            }

            $order['cart'] = $cart_of_order;

            $result[] = $order;

        }
        
        echo json_encode($result);
    }

    public function changeStatus($status)
    {
        
    }
}