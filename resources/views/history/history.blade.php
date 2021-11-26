@extends('main')

@section('content')
<div class="container bg0 p-t-150 p-b-85">
    <table class="table">
        <tbody><tr class="table_head">
            <th class="column-1">Đơn Hàng</th>
            <th class="column-2">Tên Khách Hàng</th>
            <th class="column-3">SĐT</th>
            <th class="column-4">Địa Chỉ</th>
            {{-- <th class="column-5">Email</th> --}}
            <th class="column-6">Ngày Đặt Hàng</th>
        </tr>
        @foreach($orders as $key => $order)
        <tr>
            <td style="text-align: left">{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->address }}</td>
            {{-- <td>{{ $order->email }}</td> --}}
            <td>Ngày Đặt Hàng: {{ $order->created_at }}</td>
            <td>    
                <a class="btn btn-sm" href="/orders/view/{{ $order->id }}">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection