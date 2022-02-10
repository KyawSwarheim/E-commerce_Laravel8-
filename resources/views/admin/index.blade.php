@extends('layouts.admin')
<?php
 use App\Http\Controllers\Admin\ProductController;
 use App\Http\Controllers\Admin\OrderController;
 use App\Http\Controllers\Admin\UserController;
 use App\Http\Controllers\Admin\CategoryController;
 $total_outstock = ProductController::productOutStock();
 $total_items = ProductController::productItems();
 $total_product = ProductController::totalproduct();

 $new_orders = OrderController::newOrder();
 $completeOrder = OrderController::completeOrder();
 $allOrder = OrderController::allOrder();

 $total_users = UserController::userCount();
 $total_category = CategoryController::totalcategory();
?>
@section('content')
<div class="card">
    <div class="card-body">
        <h1>Kyaw Swar Heim Coder</h1>
        <hr>
        <div class="row mt-5">
            <div class="col-md-3 mb-2">
            <a href="{{ url('products') }}">
                <div class="card-body bg-primary shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $total_product }} Total </h3>
                <h4 class="text-light font-weight-bold">Products</h4>
                </div>
            </a>
            </div>
            <div class="col-md-3 mb-2">
            <a href="{{ url('products') }}">
                <div class="card-body bg-info shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $total_items }} Products</h3>
                    <h4 class="text-light font-weight-bold">Inventory</h4>
                </div>
            </a>
            </div>
            <div class="col-md-3 mb-2">
            <a href="{{ url('orders') }}">
                <div class="card-body bg-success shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $new_orders }} orders</h3>
                    <h4 class="text-light font-weight-bold">In pending state</h4>
                </div>
            </a>
            </div>
            <div class="col-md-3 mb-2">
            <a href="{{ url('users') }}">
                <div class="card-body bg-dark shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $total_users }} total</h3>
                    <h4 class="text-light font-weight-bold">Users</h4>
                </div>
            </a>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col-md-3 mb-2">
            <a href="{{ url('categories') }}">
                <div class="card-body bg-primary shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $total_category }} Total </h3>
                <h4 class="text-light font-weight-bold">Category</h4>
                </div>
            </a>
            </div>
            <div class="col-md-3 mb-2">
            <a href="{{ url('products') }}">
                <div class="card-body bg-info shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $total_outstock }} Products</h3>
                    <h4 class="text-light font-weight-bold">Out of Stock</h4>
                </div>
            </a>
            </div>
            <div class="col-md-3 mb-2">
            <a href="{{ url('orders') }}">
                <div class="card-body bg-success shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $completeOrder }} orders</h3>
                    <h4 class="text-light font-weight-bold">In Complete</h4>
                </div>
            </a>
            </div>
            <div class="col-md-3 mb-2">
            <a href="{{ url('users') }}">
                <div class="card-body bg-dark shadow rounded" style="height: 7rem;">
                <h3 class="text-light text-center font-weight-bold">{{  $allOrder }} total</h3>
                    <h4 class="text-light font-weight-bold">Order</h4>
                </div>
            </a>
            </div>
        </div>
    </div>
</div>
@endsection
