@extends('layouts.admin')
@section('title')Orders
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <h4>New Orders
            <a href="{{ url('order-history') }}" class="btn btn-sm btn-primary float-right">Order History</a>
        </h4><hr>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Order Date</th>
                    <th>Tracking Number</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td> {{ date('d-m-Y', strtotime($order->created_at)) }} </td>
                            <td> {{ $order->tracking_no }} </td>
                            <td> Ks {{ $order->total_price }} </td>
                            <td>{{ $order->status == '0' ? 'pending' : 'completed' }} </td>
                            <td> <a href="{{ url('admin/view-orders/' . $order->id) }}" class="btn btn-primary">View</a> </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
