<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;  

class HistoryController extends Controller
{
    protected $orderItem;
    public function __construct(CartService $orderItem)
    {
        $this->orderItem = $orderItem;
    }
    public function history_customer(Customer $customer)
    {
        return view('history.history',[
            'title' => 'Danh Sách Đơn Hàng',
            'customers' => $customer,
            'orders' => $customer->customers()->get()
        ]);
    }
    public function show(Order $order)
    {
        return view('history.history_order',[
            'title' => 'Chi Tiết Đơn Hàng: '.$order->name,
            'order' => $order,
            'orderItems' => $order->orders()
            ->with(['product' => function ($query){
                $query->select('id', 'name', 'img');
            }])->get()
        ]);
    }
}
