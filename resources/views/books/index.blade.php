@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <a class="btn btn-primary mb-2" href="{{route('books.create')}}">Add New Book</a>
    {{--  @if ($books->count()>0)  --}}
    <div class="table-responsive">
        <table class="table">
            <caption>List Of Users</caption>
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book )
                    <tr>
                        <th>{{$book->tilte}}</th>
                        <th>{{$book->author}}</th>
                        <th>
                         <a class="btn btn-info" href="{{route('books.edit',$book->id)}}"><i class="bi bi-pencil-square"></i></a>
                         <a class="btn btn-info" href="{{route('books.show',$book->id)}}"><i class="bi bi-eye-fill"></i></a>

                         <form action="{{route('books.destroy',$book->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                         </form>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{--  @else  --}}

    <div class="badge badge-info">No Books Found</div>
    {{--  @endif  --}}
</div>

@endsection
