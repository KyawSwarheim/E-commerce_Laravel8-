@extends('layouts.front')
@section('title')My Orders
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/
                <a href="{{ url('my-orders') }}">My Orders</a>
            </h5>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>My Orders</h4><hr>
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
                                        <td> {{date('d-m-Y' , strtotime($order->created_at)) }} </td>
                                        <td> {{ $order->tracking_no }} </td>
                                        <td> Ks {{ $order->total_price }} </td>
                                        <td>{{ $order->status == '0' ? 'pending' :'completed' }} </td>
                                        <td> <a href="{{ url('view-orders/'.$order->id) }}" class="btn btn-primary">View</a> </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
