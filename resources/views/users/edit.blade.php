@extends('layouts.app')
@section('content')
<div class="container col-md-6 mt-2">
    <h4 class="text-center">Update User Details</h4>
    <form action="{{route('users.update',$user->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group m-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>

        <div class="form-group m-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group m-3">
            <label for="">password</label>
            <input type="password" class="form-control" name="password" value="{{$user->password}}">
        </div>
        <div class="form-group m-3">
            <button class="btn btn-primary">Update User</button>
        </div>
    </form>
</div>
@endsection
