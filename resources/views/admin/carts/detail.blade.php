@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên Khách Hàng: <strong>{{ $order->name }}</strong></li>
            <li>Số Điện Thoại: <strong>{{ $order->phone }}</strong></li>
            <li>Địa Chỉ: <strong>{{ $order->address }}</strong></li>
            <li>Email: <strong>{{ $order->email }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody><tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Total</th>
            </tr>
            @foreach($orderItems as $key => $orderItem)
            @php
                $price = $orderItem->price * $orderItem->pty;
                $total += $price;
            @endphp
            <tr>
                <td class="column-1">
                    <div class="how-itemcart1">
                        <img src="{{ $orderItem->product->img }}" alt="IMG" style="width: 100px">
                    </div>
                </td>
                <td class="column-2">{{ $orderItem->product->name }}</td>
                <td class="column-3">{{ number_format($orderItem->price, 0, '', '.') }}đ</td>
                <td class="column-4">{{ $orderItem->pty }}</td>
                <td class="column-5">${{ number_format($price, 0, '', '.') }}đ</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Tổng Tiền:</td>
                <td>{{ number_format($total, 0, '', '.') }}đ</td>
            </tr>
        </tbody>
    </table>
    </div>
@endsection