<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use DB;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    protected $cartService;
    protected $cart;
    protected $customer;
    protected $orderItem;

    public function __construct(CartService $cartService, CartService $cart, CartService $orderItem, CartService $customer)
    {
        $this->cartService = $cartService;
        $this->cart = $cart;
        $this->orderItem = $orderItem;
        $this->customer = $customer;
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
        $this->cartService->addCart($request);
        return redirect()->back();
    }

    public function carts_checkout()
    {
        $products = $this->cartService->getProduct();

        return view('carts.carts_checkout',[
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
}
