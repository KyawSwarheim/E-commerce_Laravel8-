@extends('layouts.front')
@section('title') Checkout
@endsection
@section('content')

    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/
                <a href="{{ url('checkout') }}">Checkout</a>

            </h5>
        </div>
    </div>

    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">Name *</label>
                                    <input type="text" class="form-control @error('name')is-invalid @enderror" value="{{ Auth::user()->name }}"
                                        name="name" placeholder="Enter Your Name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control @error('email')is-invalid @enderror" value="{{ Auth::user()->email }}"
                                        name="email" placeholder="Enter Your Email">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control @error('phone')is-invalid @enderror" value="{{ Auth::user()->phone }}"
                                        name="phone" placeholder="Enter Phone Number">
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address </label>
                                    <input type="text" class="form-control @error('address1')is-invalid @enderror" value="{{ Auth::user()->address1 }}"
                                        name="address1" placeholder="Enter Your Address">
                                        @error('address1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control @error('city')is-invalid @enderror" value="{{ Auth::user()->city }}" name="city"
                                        placeholder="Enter Your City">
                                        @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control @error('state')is-invalid @enderror" value="{{ Auth::user()->state }}"
                                        name="state" placeholder="Enter State">
                                        @error('state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control @error('country')is-invalid @enderror" value="{{ Auth::user()->country }}"
                                        name="country" placeholder="Enter Country">
                                        @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="number" class="form-control @error('pincode')is-invalid @enderror" value="{{ Auth::user()->pincode }}"
                                        name="pincode" placeholder="Enter Pin Code">
                                        @error('pincode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-3">
                                    <label for="" class="fw-bold">Payment method</label>
                                </div>
                                <div class="col-md-10 mt-3">
                                    <input type="radio" id="cash" name="payment_method" value="cash"
                                        class="@error('payment_method') is-invalid @enderror" id="payment_method">
                                    <label for="cash">Payment on delivery</label>
                                    <input type="radio" id="online" name="payment_method" value="online"
                                        class="@error('payment_method') is-invalid @enderror" id="payment_method">
                                    <label for="online">Online Payment</label>
                                    @error('payment_method')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            @if ($cartItems->count() > 0)
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $cartItem)
                                            <tr>
                                                <td> {{ $cartItem->products->name }} </td>
                                                <td> {{ $cartItem->prod_qty }} </td>
                                                <td> Ks {{ $cartItem->products->selling_price }} </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" class="btn btn-primary w-100">Place Order</button>
                            @else
                                <div class="card-body text-center">
                                    <h1>No Products in Cart</h1>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
