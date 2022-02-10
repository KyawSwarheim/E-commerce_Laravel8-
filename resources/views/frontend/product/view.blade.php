@extends('layouts.front')
@section('title', $products->name)
@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('add-rating') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value=" {{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate this {{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->star_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->star_rated + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="product_rating"
                                            id="rating{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor

                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 mb-4 shadow-sm bg-primary border-top">
        <div class="container">
            <h5 class="mt-0">
                <a href="{{ url('/') }}">Home</a>/
                <a href="{{ url('category/' . $products->category->slug) }}">{{ $products->category->name }}</a> /
                <a
                    href="{{ url('category/' . $products->category->slug . '/' . $products->slug) }}">{{ $products->name }}</a>
            </h5>
        </div>
    </div>

    <div class="container mb-5">
        <div class="product_data">
            <div class="">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/' . $products->image) }}" alt="Product Image"
                            class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size:16px" class="float-end badge bg-danger trending_tag"> Trending
                                </label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3"> Original-Price: <s> ks {{ $products->original_price }}</s></label>
                        <label class="fw-bold"> Selling-Price: ks {{ $products->selling_price }}</label>
                        @php $rateenum = number_format($rating_value) @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $rateenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $rateenum + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($ratings->count() > 0)
                                    {{ $ratings->count() }} Ratings
                                @else
                                    No rating
                                @endif
                            </span>
                        </div>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out Of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-2" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="1" />
                                    <button class="input-group-text increasement-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br>
                                @if ($products->qty > 0)
                                    <p class="fs-6 mt-2">Only {{ $products->qty }} items left</p>
                                @else
                                    <p class="fs-6 mt-2">There have not items</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <br />
                                @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to
                                        Cart&nbsp;<i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 float-start addToWishlist">Add to
                                    Wishlist&nbsp;<i class="fa fa-heart" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h3>Description</h3>
                        <p class="mt-3">{!! $products->description !!}</p>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-4"> <button type="button" class="btn btn-link" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Rate this product</button>
                        <a href="{{ url('add-review/' . $products->slug . '/userreview') }}" class="btn btn-link  float-end">
                            Write a Review<a>
                    </div>
                    <div class="col-md-8">
                        @foreach ($review as $item)
                            <div class="user_review">
                                <label for="">{{ $item->user->name }}</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @if ($item->user_id == Auth::id())
                                    <a href="{{ url('edit-review/'.$products->slug.'/userreview') }}" class="">Edit</a>
                                @endif
                                <br>
                                @php
                                $rating = App\Models\Rating::where('prod_id',$products->id)->where('user_id',$item->user->id)->first();
                                @endphp
                                @if ($rating)
                                    @php $user_rated = $rating->star_rated @endphp
                                    @for ($i = 1; $i <= $user_rated; $i++)
                                        <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for ($j = $user_rated + 1; $j <= 5; $j++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                @endif
                                <small>Reviewed On {{ $item->created_at->format('d M Y') }}</small>
                                <p>{{ $item->user_review }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
