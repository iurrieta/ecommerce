<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = ["status"];

    public function approve()
    {
        $this->updateCustomIDAndStatus();
    }

    /**
     * generateCustomID
     * @return string
     */
    public function generateCustomID()
    {
        return md5("$this->id $this->updated_at");
    }

    /**
     * updateCustomIDAndStatus
     */
    public function updateCustomIDAndStatus()
    {
        $this->status = "approved";
        $this->customid = $this->generateCustomID();
        $this->save();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inShoppingCarts()
    {
        return $this->hasMany("App\InShoppingCart");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne("App\Order")->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
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
     * Total in USD
     * @return float|int
     */
    public function totalUSD()
    {
        return $this->products()->sum("pricing") / 100;
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
