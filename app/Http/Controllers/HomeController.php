<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $controller = new Controller();

        return $controller->getHome();
    }

    public function get_category($type)
    {
        $products = Product::all();

        $category = array("men"=>$products->where('type', 'men'),
        "women"=>$products->where('type', 'women'),
        "kid"=>$products->where('type', 'kid'),
        "shoes"=>$products->where('type', 'shoes'),
        "bag"=>$products->where('type', 'bag'));

        return view ('home', ['products'=>$products->where('type',$type),'category'=>$category]);
    }
}
