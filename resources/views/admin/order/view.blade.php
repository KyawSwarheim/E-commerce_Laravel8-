@extends('layouts.admin')
@section('title')Orders View
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Order View
                <a href="{{ url('orders') }}" class="btn btn-sm btn-primary float-right">Back</a>
            </h4>
            <hr>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 order-details">
                    <h4>Shipping Details
                        <hr>
                        <label for="">Name</label>
                        <div class="border">{{ $orders->name }}</div>
                        <label for="">Email</label>
                        <div class="border">{{ $orders->email }}</div>
                        <label for="">Contact No.</label>
                        <div class="border">{{ $orders->phone }}</div>
                        <label for="">Shopping Address</label>
                        <div class="border">
                            {{ $orders->address1 }},
                            {{ $orders->address2 }},
                            {{ $orders->city }},
                            {{ $orders->state }},
                            {{ $orders->country }}
                        </div>
                        <label for="">Zip Code</label>
                        <div class="border">{{ $orders->pincode }}</div>
                </div>
                <div class="col-md-6">
                    <h4>Order Details</h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Image</th>
                        </thead>
                        <tbody>
                            @foreach ($orders->orderitems as $order)
                                <tr>
                                    <td> {{ $order->products->name }} </td>
                                    <td> {{ $order->qty }} </td>
                                    <td> {{ $order->price }} </td>
                                    <td>
                                        <img src="{{ asset('assets/uploads/product/' . $order->products->image) }}"
                                            alt="Image Here" width="50px">
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <h4 class="px-2">Grand Totals : <span
                            class="float-end">{{ $orders->total_price }}</span></h4><hr>
                    <h6 for="">Order Status</h6>
                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    <select class="form-select" name="order_status">
                        <option {{ $orders->status == '0'? 'selected':'' }} value="0">Pending</option>
                        <option {{ $orders->status == '1'? 'selected':'' }} value="1">Complete</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2 float-right">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
