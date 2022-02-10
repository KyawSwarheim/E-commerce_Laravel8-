@extends('layouts.front')
@section('title') My Cart
@endsection
@section('content')

    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/
                <a href="{{ url('cart') }}">Cart</a>

            </h5>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow cartitems">
            @if ($cartItems->count() > 0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartItems as $cartItem)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/product/' . $cartItem->products->image) }}" alt="Image here"
                                height="70px" width="70px">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $cartItem->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>Ks {{ $cartItem->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $cartItem->prod_id }}">
                            @if ($cartItem->products->qty >= $cartItem->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="{{ $cartItem->prod_qty }}" />
                                    <button class="input-group-text changeQuantity increasement-btn">+</button>
                                </div>
                                @php $total += $cartItem->products->selling_price * $cartItem->prod_qty; @endphp
                            @else
                            <h6>Out of Stock </h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer">
                <h6>Total Price : Ks {{ $total }}
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
                </h6>
            </div>

            @else
            <div class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i> Cart is Empty</h2>
                <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>

            @endif

        </div>
    </div>
@endsection
