<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Category;
use Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();

class CheckoutController extends Controller
{
    public function index() {
        $carts = Cart::content();
        $total = Cart::total();
        $priceTotal = Cart::priceTotal();
        $tax = Cart::tax();
        $category = Category::orderBy('status', 'ASC')->get();
        return view('client/delivery',compact('carts', 'total', 'tax', 'priceTotal','category'));
    }

    public function add_order(Request $request) {
        // Thêm đơn hàng
        $order = Orders::create($request->all());
        

        // Thêm đơn hàng chi tiết
        $carts = Cart::content();
        
        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'quantity' => $cart->qty,
                'total' => $cart->total,
            ];

            OrdersDetail::create($data);
        };

        //Xóa giỏ hàng
        Cart::destroy();

        // Trả về kết quả
        return "Success ^_^";
    }
}
