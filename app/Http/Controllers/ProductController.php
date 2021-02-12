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
        //Adding Validations
        $rules = [
            'query' => 'bail|required|string|max:20',
        ];
        //        Status : 400 (Server could not understand the request)
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data =  Product::where('name', 'like', '%'.$request->input('query').'%') -> get();
        return view('search', compact('data'));
    }

    public function addToCart(Request $request) {

        //Adding Validations
        $rules = [
            'product_id' => 'bail|required|integer',
            'product_qty' => 'bail|required|integer'
        ];
        //        Status : 400 (Server could not understand the request)
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $originalQuantity = Product::find($request->product_id)->value('quantity');
        if ($request->product_qty > $originalQuantity) {
            return response()->json(['success'=>false,
                'Product Id' => $request->product_id,
                'message' => 'Insufficient amount of Products available',
                'quantityAvailable' => $originalQuantity]);
        }
        if ($request->session()->has('user')){
            $cart = new Cart();
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->product_qty;
            $productCost = Product::where('id','=',$request->product_id)->value('price');
            $cart->cost = $request->product_qty * $productCost;
            $cart->save();
            return redirect('/cartList');
        }
        else {
            return redirect("/login");
        }
//        return $request->input();
    }

    public static function getNumberOfItemsInCart() {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function getCartList() {
        $userId = Session::get('user')['id'];
        $products = Cart::join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.name as name', 'products.price as price', 'products.id as id', 'products.image as image',
                'cart.id as cart_id', 'cart.quantity as cart_qty', 'cart.cost as total_price')
            ->get();
        return view('cartList', compact('products'));
    }

    public function removeCart($id) {
        Cart::destroy($id);
        return redirect('cartList');
    }

    public function orderNow() {
        $userId = Session::get('user')['id'];
        $total = Cart::where('cart.user_id',$userId)
            ->sum('cart.cost');
        return view('order', ['total' =>$total]);
    }

    public function placeOrder(Request $request) {
        //Adding Validations
        $rules = [
            'payment' => 'bail|required|string',
            'address' => 'bail|required|string'
        ];
        //        Status : 400 (Server could not understand the request)
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $userId = Session::get('user')['id'];
        $allItems = Cart::where('user_id',$userId)->get();
        $productsCart=Cart::join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*', 'products.quantity as originalQuantity','cart.*','cart.id as cart_id', 'cart.quantity as cart_qty')
            ->get();
        $array_Quantity = array();
        $idx = 0;
        foreach ($productsCart as $item)
        {
            $array_Quantity = array_add($array_Quantity, $idx, $item->cart_qty);
            $idx += 1;
            $leftQuantity = $item->originalQuantity - $item->cart_qty;
            Product::where('id', $item->product_id)
                ->limit(1)
                ->update(array('quantity' => $leftQuantity));
        }
        $idForOrder = rand(1999,9999).array_rand(["A","B","C","D","E"]).rand(200,500);
        $idx = 0;
        foreach ($allItems as $item)
        {
            $order = new Order();
            $order->product_id = $item['product_id'];
            $order->order_id = $idForOrder;
            $order->user_id = $item['user_id'];
            $order->quantity = $array_Quantity[$idx];
            $idx ++;
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
            ->select('*', 'orders.quantity as qty')
            ->get();
        $orderId = 0;
        foreach ($orders as $order)
        {
            $orderId = $order->order_id;
            break;
        }
        return view('myorders', compact('orders', 'orderId'));
    }
}
