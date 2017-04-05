<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "recipient_name",
        "line1",
        "line2",
        "city",
        "country_code",
        "state",
        "postal_code",
        "email",
        "shopping_cart_id",
        "status",
        "total",
        "guide_number"
    ];

    /**
     * Create from PayPal response
     * @param $response
     * @param $shopping_cart
     * @return static
     */
    public static function createFromPaypalResponse($response, $shopping_cart)
    {
        $payer = $response->payer;

        $orderData = (array) $payer->payer_info->shipping_address;
        $orderData = $orderData[key($orderData)];
        $orderData["email"] = $payer->payer_info->email;
        $orderData["total"] = $shopping_cart->total();
        $orderData["shopping_cart_id"] = $shopping_cart->id;

        return Order::create($orderData);
    }

    /**
     * Last result
     * @param $query
     * @return mixed
     */
    public function scopeLatest($query)
    {
        return $query->orderID()->monthly();
    }

    /**
     * Order by Id
     * @param $query
     * @return mixed
     */
    public function scopeOrderID($query)
    {
        return $query->orderBy("id", "desc");
    }

    /**
     * Find by month
     * @param $query
     * @return mixed
     */
    public function scopeMonthly($query)
    {
        return $query->whereMonth("created_at", "=", date("m"));
    }

    /**
     * Total of the month in USD
     * @return float|int
     */
    public static function totalMonth()
    {
        return Order::monthly()->sum("total") / 100;
    }

    /**
     * Total of quantity of the month
     * @return mixed
     */
    public static function totalMonthCount()
    {
        return Order::monthly()->count();
    }

    /**
     * Address
     * @return string
     */
    public function address()
    {
        return "$this->line1 $this->line2";
    }
}
