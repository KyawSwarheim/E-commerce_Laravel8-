@extends('layouts.front')
@section('title'," Edit your Review")
@section('content')
    <div class="py-3 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/Edit Review
            </h5>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5> Your are writing a review for {{ $review->product->name }}</h5>
                        <form action="{{ url('update-review') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control" name="user_review" id="user_review" cols="30" rows="10" placeholder="Write a Review">{{ $review->user_review }}</textarea>
                            <button type="submit" class="btn btn-primary mt-3">Update Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
