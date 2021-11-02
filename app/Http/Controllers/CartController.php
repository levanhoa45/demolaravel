<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CartController extends Controller
{
    protected $cartService;
    protected $cart;

    public function __construct(CartService $cartService, CartService $cart)
    {
        $this->cartService = $cartService;
        $this->cart = $cart;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect('/carts');
    }
    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list',[
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
    }
    public function addCart(Request $request)
    {
        $result = $this->cartService->addCart($request);

        return redirect()->back();
    }
}
