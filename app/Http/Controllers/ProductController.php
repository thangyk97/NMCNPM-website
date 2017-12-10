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

    /**
     * add product to cart and return view of cart
     */
    public function getAddToCart(Request $request, $id) {

        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return view('cart', compact('cart'));
    }

    /**
     * return view cart
     */
    public function viewCart(Request $request) {

        $cart = Session::has('cart') ? Session::get('cart') : null;

        return view('cart', compact('cart'));
    }

    /**
     * return view checkout
     */
    public function checkout(Request $request) {

        $cart = Session::has('cart') ? Session::get('cart') : null;

        return view('checkout', compact('cart'));

    }

    /**
     * save information of customer to database
     */
    public function postInforCustomer(Request $request) {

        $order = new Order;

        $order->company_name = $request->companyName;

        $order->email = $request->email;

        $order->name = $request->name;

        $order->phone = $request->phone;

        $order->address1 = $request->address1;

        $order->title = $request->title;

        $order->address2 = $request->address2;

        $order->save();

        echo "saved infor";

    }

    /**
     * Get all orders to app java
     * Return: json string
     */
    public function getOrders() {
        $orders = Order::all();

        $ordersArray = $orders->toArray();

        echo json_encode($ordersArray);
        
        
    }

    /**
     * Upload product data, save to database
     * table products
     */
    public function upload(Request $request){

        if($request->hasFile('image')) {

            $file = $request->file('image');

            $fileName = $file->getClientOriginalName('image'); 

            $file->move('images/image_product', $fileName);

            $product = new Product;

            $product->name = $request->name;

            $product->price = $request->price;

            $product->amount = $request->amount;

            $product->link_img = "images/image_product/".$fileName;

            $product->save();

            $response = "Saved product data";

            return view('upload', compact('response'));

        }


  

    }

    /**
     * Return upload page
     */
    public function getUploadPage() {

        $response = "";

        return view('upload', compact('response'));

    }

}
