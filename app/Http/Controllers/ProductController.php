<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $trun_data = Product::inRandomOrder()->take(8)->get();
        return view('product', compact('trun_data'));
    }

    public function show(){
        $data = Product::inRandomOrder()->paginate(8);
        $categories = DB::table('categories')->get();
        return view('products', compact('data', 'categories'));
    }

    public function showCategoryWise($name) {
        $data = Product::where('category','like', $name)->paginate(8);
        $categories = DB::table('categories')->get();
        return view('products', compact('data', 'categories'));
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
            return redirect('/cartList');
        }
        else {
            return redirect("/login");
        }
    }

    public static function getNumberOfItemsInCart() {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function getCartList() {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('cartList', ['products' =>$products]);
    }

    public function removeCart($id) {
        Cart::destroy($id);
        return redirect('cartList');
    }

    public function orderNow() {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');
        return view('order', ['total' =>$total]);
    }

    public function placeOrder(Request $request) {
        $userId = Session::get('user')['id'];
        $allItems = Cart::where('user_id',$userId)->get();
        foreach ($allItems as $item)
        {
            $order = new Order();
            $order->product_id = $item['product_id'];
            $order->user_id = $item['user_id'];
            $order->status = 'Pending';
            $order->payment_method =  $request->payment;
            $order->payment_status = 'Pending';
            $order->address =  $request->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        $request->input();
        return redirect('/orderNow');
    }

    public function orders() {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userId)
            ->get();
        return view('myorders', compact('orders'));
    }
}
