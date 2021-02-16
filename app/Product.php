<?php

namespace App;
use App\Http\Requests\CartRequest;
use App\Http\Requests\ProductSearchRequest;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function categories() {
//        return $this->belongsToMany('App\Category');
//    }
//
    public function findByID($id) {
        if(empty($id)) {
            return null;
        }
        return self::find($id);
    }

    public function index() {
        return self::inRandomOrder();
    }

    public function showCategoryWise($name) {
        $data = self::where('category','like', $name)->paginate(8);
        return $data;
    }

    public function search(ProductSearchRequest $request) {
        return self::where('name', 'like', '%'.$request->input('query').'%') -> get();
    }

    public function findQuantity(CartRequest $request) {
        return self::where('id', '=', $request->product_id)->value('quantity');
    }

    public function findCost($request) {
        return self::where('id','=',$request->product_id)->value('price');
    }

    public function updateQuantity($item, $leftQuantity) {
        self::where('id', $item->product_id)
            ->limit(1)
            ->update(array('quantity' => $leftQuantity));
    }
}
