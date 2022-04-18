<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function show_dashboard()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return view('admin.dashboard');
        }else {
            return Redirect::to('/admin');
        }
    }
    public function dashboard(Request $request)
    {
       $result = DB::table('accout_admin')->where('email', $request->email)->where('password', md5($request->password))->first();
       if ($result) {
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return Redirect::to('/admin/dashboard');
       }else {
           Session::put('massage','Tài khoản hoặc mật khẩu không chính xác. Mời bạn nhập lại');
           return Redirect::to('/admin');
       }
    }
    public function index()
    {
        return view('admin.login');
    }
    public function logOut()
    {
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/admin');
    }
    public function file()
    {
       return view('admin.file');
    }
}
