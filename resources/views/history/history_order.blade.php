@extends('main')
@section('content')
<div class="carts bg0 p-t-150 p-b-85">
    @php $total = 0; @endphp
    <div class="container">
        <table class="table">
            <tbody><tr class="table_head">
                <th class="column-1">Hình Ảnh</th>
                <th class="column-2">Tên Sản Phẩm</th>
                <th class="column-3">Giá Tiền</th>
                <th class="column-4">Số Lượng</th>
                <th class="column-5">Tổng Tiền: </th>
            </tr>
            @foreach($orderItems as $key => $orderItem)
            @php
                $price = $orderItem->price * $orderItem->pty;
                $total += $price;
            @endphp
            <tr>
                <td class="column-1">
                    <div class="">
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
                <td colspan="4" class="text-right">Tổng Tiền Của Đơn Hàng:</td>
                <td>{{ number_format($total, 0, '', '.') }}đ</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection