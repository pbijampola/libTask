@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <a class="btn btn-primary mb-2" href="{{route('users.create')}}">Add User</a>
    <div class="table-responsive">
        <table class="table">
            <caption>List Of Users</caption>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                    <tr>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>

                         <a class="btn btn-info" href="{{route('users.edit',$user->id)}}">Edit</a>
                         <form action="{{route('users.destroy',$user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                         </form>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
