<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getHome() {
        $products = Product::all();
        
        $category = array("men"=>$products->where('type', 'men'),
        "women"=>$products->where('type', 'women'),
        "kid"=>$products->where('type', 'kid'),
        "shoes"=>$products->where('type', 'shoes'),
        "bag"=>$products->where('type', 'bag'));

        return view ('home', ['products'=>$products,'category'=>$category]);
    }


}
