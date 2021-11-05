@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Đơn Hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Email</th>
            <th>Ngày Đặt Hàng</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($orders as $key => $order)
            <tr>
                <td style="text-align: left">{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/orders/view/{{ $order->id }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $orders->links() !!}
    </div>
@endsection