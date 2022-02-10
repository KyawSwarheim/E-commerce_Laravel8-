@extends('layouts.front')
@section('title') My Cart
@endsection
@section('content')

    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/
                <a href="{{ url('wishlist') }}">Wishlist</a>

            </h5>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow wishlistitems">
            <div class="card-body">
                @if ($wishlists->count() > 0)
                    @foreach ($wishlists as $wishlist)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/product/' . $wishlist->products->image) }}"
                                    alt="Image here" height="70px" width="70px">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $wishlist->products->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>Ks {{ $wishlist->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $wishlist->prod_id }}">
                                @if ($wishlist->products->qty >= $wishlist->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="1" />
                                    <button class="input-group-text increasement-btn">+</button>
                                </div>
                                @else
                                    <h6>Out of Stock </h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-success addToCartBtn"> <i class="fa fa-shopping-cart"></i>
                                    Cart To Cart</button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger remove-wishlist-item"> <i class="fa fa-trash"></i>
                                    Remove</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4> There is no products in your Wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
