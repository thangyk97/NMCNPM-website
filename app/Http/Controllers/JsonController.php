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
        $orders = Order::all();

        $result = array();

        $cart = array();

        foreach ($orders as $order)
        {

            $cart = DB::table('cart')->get()->where('id_order', $order['id']);

            $carts = array();

            foreach ($cart as $content)
            {
                array_push($carts, $content);
            }

            $order['cart'] = $carts;

            array_push($result, $order);

        }
        
        echo json_encode($result);
  
    }
}