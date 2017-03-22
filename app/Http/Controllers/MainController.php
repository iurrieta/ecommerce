<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class MainController extends Controller
{

    public function home()
    {
        return view("main.home");
    }
}