<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request) {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $product_info = Product::find($product_id);
        Cart::add(['id' => $product_id, 'name' => $product_info->name, 'qty' => $quantity, 'price' => $product_info->price, 'weight' => 550, 'options' => ['image' => $product_info->image]]);
        return Redirect::to('/show_cart');
    }
    public function show_cart() {
        $category = Category::orderBy('status', 'ASC')->get();
        return view('client/cart',compact('category'));
    }
    public function delete_cart($rowId) {
        Cart::destroy();
        return Redirect::to('/show_cart');
    }
}
