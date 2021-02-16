<?php

namespace App;

use App\Http\Requests\CartRequest;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = 'cart';

    public function createCart(CartRequest $request) {
        $cart = new Cart();
        $cart->user_id = $request->session()->get('user')['id'];
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->product_qty;

        $productObj = new Product();
        $productCost = $productObj->findCost($request);

        $cart->cost = $request->product_qty * $productCost;
        $cart->save();
    }

    public function getItems($userId) {
        return self::where('user_id', $userId);
    }

    public function getCartList($userId) {
        return self::join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.name as name', 'products.price as price', 'products.id as id', 'products.image as image',
                'cart.id as cart_id', 'cart.quantity as cart_qty', 'cart.cost as total_price')
            ->get();
    }

    public function getTotalCost($userId) {
        return self::where('cart.user_id',$userId)
            ->sum('cart.cost');
    }
}
