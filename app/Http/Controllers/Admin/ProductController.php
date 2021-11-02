<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productService;
   
    public function  __construct(ProductAdminService $productSerevice)
    {
        $this->productService = $productSerevice;
    }
    public function index()
    {
        return view('admin.product.list',[
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->get()
        ]);
    }

    
    public function create()
    {
        return view('admin.product.add',[
            'title' => 'Thêm Sản Phẩm Mới'
        ]);
    }

    
    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->back();
    }

    
    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'product' => $product
        ]);
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result){
            return redirect('/admin/products/list');
        }
        return redirect()->back();
    }

    
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response()->json([ 'error' => true]);
    }
}
