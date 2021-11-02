<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class MainController extends Controller
{
    protected $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return view('home', [
            'title' => 'Shop ABC',
            'products' => $this->product->get()
        ]);
    }
    public function loadProduct(Request $request)
    {
        $page = $request->input('page',0);
        $result = $this->product->get($page);
        if($result){
            $html = view('products.list', ['products' => $result ])->render();
            return response()->json([ 'html' => $html]);
        }
        return response()->json(['html' => '']);
    }
}