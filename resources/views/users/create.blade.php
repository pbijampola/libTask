@extends('layouts.app')
@section('content')
    <div class="container col-md-6">
        <h4 class="text-center">Add New User Here</h4>
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="form-group m-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>

            <div class="form-group m-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group m-3">
                <label for="">password</label>
                <input type="password" class="form-control" name="password" value="{{old('password')}}">
            </div>
            <div class="form-group m-3">
                <button class="btn btn-primary"> Add User</button>
            </div>
        </form>
    </div>
@endsection
