<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CartRequest;
use App\Http\Requests\ProductOrderRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Product;
use App\Cart;
use App\Order;
use Session;
use Validator;

class ProductController extends Controller
{

    public function index()
    {
        $productObj = new Product();
        $trun_data =  $productObj->index()->take(8)->get();

        return view('product', compact('trun_data'));
    }

    public function show(){
        $productObj = new Product();
        $data =  $productObj->index()->paginate(8);

        $categories = Category::get();
        return view('products', compact('data', 'categories'));
    }

    public function showCategoryWise($name) {
        $productObj = new Product();
        $data = $productObj->showCategoryWise($name);
        $categories = Category::get();
        return view('products', compact('data', 'categories'));
    }


    public function product($id) {
        $productObj = new Product();
        $product =  $productObj->findByID($id);

        return view('detail', compact('product'));
    }

    public function search(ProductSearchRequest $request) {
        $productObj = new Product();
        $data =  $productObj -> search($request);

        return view('search', compact('data'));
    }

    public function addToCart(CartRequest $request) {
        $productObj = new Product();
        $originalQuantity = $productObj -> findQuantity($request);

        if ($request->product_qty > $originalQuantity) {
            return response()->json(['success'=>false,
                'Product Id' => $request->product_id,
                'message' => 'Insufficient amount of Products available',
                'quantityAvailable' => $originalQuantity]);
        }
        if ($request->session()->has('user')){
            $cartObj = new Cart();
            $cartObj->createCart($request);
            return redirect('/cartList');
        }
        else {
            return redirect("/login");
        }
    }

    public static function getNumberOfItemsInCart() {
        $userId = Session::get('user')['id'];

        $cartObj = new Cart();

        return $cartObj->getItems($userId)->count();
    }

    public function getCartList() {
        $userId = Session::get('user')['id'];

        $cartObj = new Cart();
        $products = $cartObj->getCartList($userId);

        return view('cartList', compact('products'));
    }

    public function removeCart($id) {
        Cart::destroy($id);
        return redirect('cartList');
    }

    public function orderNow() {
        $userId = Session::get('user')['id'];

        $cartObj = new Cart();
        $total = $cartObj->getTotalCost($userId);

        return view('order', ['total' =>$total]);
    }

    public function placeOrder(ProductOrderRequest $request) {

        $userId = Session::get('user')['id'];

        $cartObj = new Cart();
        $allItems = $cartObj->getItems($userId)->get();

        $productsCart = $cartObj->getCartList($userId);

        $array_Quantity = array();
        $idx = 0;
        foreach ($productsCart as $item)
        {
            $array_Quantity = array_add($array_Quantity, $idx, $item->cart_qty);
            $idx += 1;
            $leftQuantity = $item->originalQuantity - $item->cart_qty;

            $productObj = new Product();
            $productObj->updateQuantity($item, $leftQuantity);
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
            $cartObj->destroyCart($userId);
        }
        return redirect('/orderNow');
    }

    public function orders() {
        $userId = Session::get('user')['id'];

        $orderObj = new Order();
        $orders = $orderObj->getOrders($userId);
        $orderId = 0;
        foreach ($orders as $order)
        {
            $orderId = $order->order_id;
            break;
        }
        return view('myorders', compact('orders', 'orderId'));
    }
}
