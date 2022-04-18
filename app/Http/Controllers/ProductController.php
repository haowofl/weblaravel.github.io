<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Product::with('cat')->orderBy('created_at','DESC')->search()->paginate(5);

        return view('admin.products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cats = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.products.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (Product::create($request->all())) {
            return redirect()->route('products.index')->with('success', 'Thêm mới thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $products
     * @return Response
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $cats = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.products.edit',compact('product','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $products
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->has('file_upload')>0) {
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads'), $file_name);
            $request->merge(['image' => $file_name]);
        }
        elseif($request->has('file_old')) {
            $file_name = $request->file_old;
            $request->merge(['image' => $file_name]);
        }
        if ($product->update($request->all())) {
            return redirect()->route('products.index')->with('success', 'Sửa mới thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $products
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Xóa danh mục thành công');
    }
}
