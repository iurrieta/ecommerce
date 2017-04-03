<?php

namespace App\Http\Controllers;

use App\PayPal;
use App\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartsController extends Controller
{
    public function index()
    {
        $shopping_cart_id = \Session::get("shopping_cart_id");
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

        $paypal = new PayPal($shopping_cart);
        $payment = $paypal->generate();

        return redirect($payment->getApprovalLink());

        /*$products = $shopping_cart->products()->get();
        $total = $shopping_cart->total();

        return view("shopping_carts.index", compact("products", "total"));*/
    }
}
