<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id) {

        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return view('cart', compact('cart'));
    }

    public function viewCart(Request $request) {

        $cart = Session::has('cart') ? Session::get('cart') : null;

        return view('cart', compact('cart'));
    }

    public function checkout(Request $request) {

        $cart = Session::has('cart') ? Session::get('cart') : null;

        return view('checkout', compact('cart'));

    }

    public function postInforCustomer(Request $request) {

        $order = new Order;

        $order->company_name = $request->companyName;

        $order->email = $request->email;

        $order->name = $request->name;

        $order->phone = $request->phone;

        $order->address1 = $request->address1;

        $order->save();

        echo "saved infor";

    }

    public function getOrders() {
        $orders = Order::all();

        $ordersArray = $orders->toArray();



        echo json_encode($ordersArray);
        
        
    }

}
