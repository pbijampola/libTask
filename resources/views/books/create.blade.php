@extends('layouts.app')
@section('content')
    <div class="container col-md-6">
        <h4 class="text-center">Add New Book Here</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group m-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="tilte" value="{{old('tilte')}}">
            </div>

            <div class="form-group m-3">
                <label for="">Auhor</label>
                <input type="text" class="form-control" name="author" value="{{old('author')}}">
            </div>
            <div class="form-group m-3">
                <label for="">Cover Image</label>
                <input type="file" class="form-control" name="image" value="{{old('image')}}">
            </div>
            <div class="form-group m-3">
                <label for="">Short Description</label>
                <textarea name="short_decs" class="form-control" cols="3" rows="5">{{old('short_decs')}}</textarea>
            </div>
            <div class="form-group m-3">
                <label for="">Full Description</label>
                <textarea name="full_decs" class="form-control"  cols="3" rows="5">{{old('full_decs')}}</textarea>
            </div>
            <div class="form-group m-3">
                <button class="btn btn-primary"> Add Book</button>
            </div>
        </form>
    </div>
@endsection
