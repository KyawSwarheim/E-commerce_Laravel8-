@extends('layouts.admin')
@section('title')Users
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Regstered Users</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name .' '. $user->lname }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td> <a href="{{ url('view-users/' . $user->id) }}" class="btn btn-primary">View</a> </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
