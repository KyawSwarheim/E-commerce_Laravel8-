@extends('layouts.front')
@section('title')Order View
@endsection
@section('content')
    <div class="py-3 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/
                <a href="{{ url('view-orders') }}">Order View</a>
            </h5>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order View
                            <a href="{{ url('my-orders') }}" class="btn btn-primary float-end">Back</a></h4>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details
                                    <hr>
                                <label for="">First Name</label>
                                <div class="border">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{ $orders->lname }}</div>
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
                                <h4>Order Details</h4><hr>
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
                                                    <img src="{{ asset('assets/uploads/product/'.$order->products->image) }}" alt="Image Here" width="50px">
                                                </td>

                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Totals : <span class="float-end">{{ $orders->total_price }}</span></h4>
                                <h6 class="px-2">Payment mode : {{ $orders->payment_method }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
