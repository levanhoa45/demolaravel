<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function insert($request)
    {
        try {
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('success', 'Thêm sản phẩm lỗi');
            \Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }
    public function get()
    {
        return Product::orderByDesc('id')->paginate(15);
    }


    public function update($request, $product)
    {
        try{
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Sửa sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('success', 'Sửa sản phẩm lỗi');
            \Log::info($err->getMessage());
            return  false;
        }
        return true;
    }
    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
}