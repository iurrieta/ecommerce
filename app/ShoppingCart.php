<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = ["status"];

    public function inShoppingCarts()
    {
        return $this->hasMany("App\InShoppingCart");
    }

    public function products()
    {
        return $this->belongsToMany("App\Product", "in_shopping_carts");
    }
    
    /**
     * Cantidad de productos
     * @return int
     */
    public function productsSize()
    {
        return $this->products()->count();
    }

    /**
     * Suma del total de productos del carrito
     * @return mixed
     */
    public function total()
    {
        return $this->products()->sum("pricing");
    }

    /**
     * Find session or create one
     * @param $shopping_cart_id
     * @return ShoppingCart|mixed
     */
    public static function findOrCreateBySessionID($shopping_cart_id)
    {
        if ($shopping_cart_id)
            return ShoppingCart::findBySession($shopping_cart_id);
        else
            return ShoppingCart::createWithoutSession();
    }

    /**
     * Find session
     * @param $shopping_cart_id
     * @return mixed
     */
    public static function findBySession($shopping_cart_id)
    {
        return ShoppingCart::find($shopping_cart_id);
    }

    /**
     * Create without session
     * @return static
     */
    public static function createWithoutSession()
    {
        return ShoppingCart::create([
            "status" => "incompleted"
        ]);
    }
}
