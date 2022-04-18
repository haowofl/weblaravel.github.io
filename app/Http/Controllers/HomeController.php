<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
use Session;
use App\Models\Slide;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('status', 'ASC')->get();
        $data = Slide::orderBy('id', 'ASC')->paginate(3);
        return view('client/home',compact('category','data'));
    }
    public function cart() {
        $category = Category::orderBy('status', 'ASC')->get();
        return view('client/cart',compact('category'));
    }
    public function login() {
        return view('client/login');
    }
    public function login_process (Request $request) {
        $user_email = $request->email;
        $user_password = md5($request->password);
        $result = DB::table('user')->where('email', $user_email)->where('password', $user_password)->first();
        $category = Category::orderBy('status', 'ASC')->get();
        $data = Slide::orderBy('id', 'ASC')->paginate(3);
        if ($result) {
            Session::put('name',$result->name);
            Session::put('user_id',$result->id);
            return view('client/home',compact('category','data'));;
        }else {
            Session::put('massage','Tài khoản hoặc mật khẩu không chính xác. Mời bạn nhập lại');
            return Redirect::to('/client/login');
        }
    }
    public function cat_product($id)
    {
        $category = Category::orderBy('status', 'ASC')->get();
        $product = Product::where('category_id', $id)->search()->paginate(8);
        $cat_id = Category::find($id);
        return view('client/cat_product',compact('category','product','cat_id'));
    }
    public function product_detail($id) {
        $category = Category::orderBy('id', 'ASC')->get();
        $product = Product::find($id);
        return view('client/product_detail',compact('category','product'));

    }

}
