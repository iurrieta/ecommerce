<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "MainController@home");
Route::get('/carrito', "ShoppingCartsController@index");
Route::post('/carrito', "ShoppingCartsController@checkout");

Route::get('/payments/store', "PaymentsController@store");

Auth::routes();

Route::get('/home', 'HomeController@index');

// Products resource
Route::resource("products", "ProductsController");

// In shopping carts resource
Route::resource("in_shopping_carts", "InShoppingCartsController", [
    "only" => ["store", "destroy"]
]);

Route::resource("compras", "ShoppingCartsController", [
    "only" => ["show"]
]);

Route::resource("orders", "OrdersController", [
    "only" => ["index", "update"]
]);

// get images
Route::get("products/images/{filename}", function($filename) {
    $path = storage_path("app/images/$filename");

    if (!\File::exists($path)) abort(404);

    $file = \File::get($path); // file
    $type = \File::mimeType($path); // type file

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});