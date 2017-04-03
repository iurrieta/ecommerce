<?php

namespace App\Http\Controllers;

use App\Order;
use App\PayPal;
use App\ShoppingCart;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function store(Request $request)
    {
        $shopping_cart_id = \Session::get("shopping_cart_id");
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

        $paypal = new PayPal($shopping_cart);
        $response = $paypal->execute($request->paymentId, $request->PayerID);

        if ($response->state == "approved")
        {
            $order = Order::createFromPaypalResponse($response, $shopping_cart);
        }

        return view("shoping_carts.completed", compact("shopping_cart", "order"));
        //dd($order);
    }
}
