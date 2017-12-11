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
        $orders = Order::all();

        $ordersArray = $orders->toArray();

        echo json_encode($ordersArray);
        
        
    }

    public function getCart() 
    {

    }
}