@extends('layouts.app')
@section('content')
    <div class="container col-md-6">
        <h4 class="text-center">Update Book Here</h4>
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
        <form action="{{route('books.update',$book->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group m-3">
                <label for="">Tilte</label>
                <input type="text" class="form-control" name="tilte" value="{{$book->tilte}}">
            </div>

            <div class="form-group m-3">
                <label for="">Auhor</label>
                <input type="text" class="form-control" name="author" value="{{$book->author}}">
            </div>
            <div class="form-group m-3">
                <label for="">Cover Image</label>
                <input type="file" class="form-control" name="image" value="{{$book->image}}">
            </div>
            <div class="form-group m-3">
                <label for="">Short Description</label>
                <textarea name="short_decs" class="form-control" cols="3" rows="5">{{$book->short_decs}}</textarea>
            </div>
            <div class="form-group m-3">
                <label for="">Full Description</label>
                <textarea name="full_decs" class="form-control"  cols="3" rows="5">{{$book->full_decs}}</textarea>
            </div>
            <div class="form-group m-3">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
