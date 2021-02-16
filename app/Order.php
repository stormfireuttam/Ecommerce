<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function getOrders($userId) {
        return self::join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userId)
            ->select('*', 'orders.quantity as qty')
            ->get();
    }
}
