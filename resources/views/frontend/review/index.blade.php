@extends('layouts.front')
@section('title'," White a Review")
@section('content')
    <div class="py-3 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/
                <a href="#">Review</a>
            </h5>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($vertified_purchase->count()>0)
                        <h5> Your are writing a review for {{ $product->name }}</h5>
                        <form action="{{ url('add-review') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <textarea class="form-control" name="user_review" id="user_review" cols="30" rows="10" placeholder="Write a Review"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                        </form>
                        @else
                        <div class="alert alert-danger">
                            <h5>You are not eligible to review this product</h5>
                            <p>For the trusthworthiness of the reviews, only customers who purchased
                                the product can write a review about the product.
                            </p>
                            <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go to Home Page</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
