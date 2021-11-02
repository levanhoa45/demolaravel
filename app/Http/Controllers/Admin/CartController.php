<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        return view('admin.carts.customer',[
            'title' => 'Danh Sách Đơn Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }
    public function show(Customer $customer)
    {
        return view('admin.carts.detail',[
            'title' => 'Chi Tiết Đơn Hàng: ' .$customer->name,
            'customer' => $customer,
            'carts' => $customer->carts()->with(['product' => function ($query){
                $query->select('id', 'name', 'img');
            }])->get()
        ]);
    }
}
