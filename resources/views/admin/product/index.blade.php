@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Product Page</h4>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="cate-image" alt="Image Here">
                    </td>
                    <td>
                        <a href="{{ url('edit-product/'.$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-product/'.$product->id) }}" class="btn btn-danger btn-sm">Detele</a>
                 </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
