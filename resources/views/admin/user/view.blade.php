@extends('layouts.admin')
@section('title')Users
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <h4>User Details
                <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Back</a>
            </h4>
            <hr>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Role</label>
                    <div class="p-2 border">{{ $users->roles_as == '0' ? 'Admin':'User' }}</div>
                </div>
                <div class="col-md-4">
                    <label for="">First Name</label>
                    <div class="p-2 border">{{ $users->name }}</div>
                </div>
                <div class="col-md-4">
                    <label for="">Last Name</label>
                    <div class="p-2 border">{{ $users->lname }}</div>
                </div>
                <div class="col-md-4 mt-2">
                    <label for="">Phone</label>
                    <div class="p-2 border">{{ $users->phone }}</div>
                </div>
                <div class="col-md-4 mt-2">
                    <label for="">Email</label>
                    <div class="p-2 border">{{ $users->email }}</div>
                </div>
                <div class="col-md-4 mt-2">
                    <label for="">Address</label>
                    <div class="p-2 border">{{ $users->address1 }}</div>
                </div>
                <div class="col-md-4 mt-2">
                    <label for="">City</label>
                    <div class="p-2 border">{{ $users->city }}</div>
                </div>
                <div class="col-md-4 mt-2">
                    <label for="">State</label>
                    <div class="p-2 border">{{ $users->state }}</div>
                </div>
                <div class="col-md-4 mt-2">
                    <label for="">Country</label>
                    <div class="p-2 border">{{ $users->country }}</div>
                </div>
                <div class="col-md-4 mt-2">
                    <label for="">Zip Code</label>
                    <div class="p-2 border">{{ $users->pincode }}</div>
                </div>

            </div>
        </div>
    </div>

@endsection
