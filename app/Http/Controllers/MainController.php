<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class MainController extends Controller
{

    public function home()
    {
        $products = Product::latest()->simplePaginate(2);
        return view("main.home", compact("products"));
    }
}