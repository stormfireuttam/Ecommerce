<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class ProductController extends Controller
{

    public function index()
    {
        $trun_data = Product::take(4)->get();
        return view('product', compact('trun_data'));
    }
    public function product($id) {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }
    public function search(Request $request) {
        $data =  Product::where('name', 'like', '%'.$request->input('query').'%') -> get();
        return view('search', compact('data'));
    }
    public function addToCart(Request $request) {
        if ($request->session()->has('user')){
            $cart = new Cart();
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');
        }
        else {
            return redirect("/login");
        }
    }
    public static function getNumberOfItemsInCart() {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

}
