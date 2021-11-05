<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $orderItem;
    public function __construct(CartService $orderItem)
    {
        $this->orderItem = $orderItem;
    }
    public function index()
    {
        return view('admin.carts.order',[
            'title' => 'Danh Sách Đơn Hàng',
            'orders' => $this->orderItem->getOrder()
        ]);
    }
    public function show(Order $order)
    {
        return view('admin.carts.detail',[
            'title' => 'Chi Tiết Đơn Hàng: ' .$order->name,
            'order' => $order,
            'orderItems' => $order->orders()
            ->with(['product' => function ($query){
                $query->select('id', 'name', 'img');
            }])->get()
        ]);
    }
}
