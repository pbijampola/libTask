@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center p-3 m-auto">
            @foreach ($books as $book)
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/uploads/books' . $book->image) }}" class="card-img-top" alt="image">

                        <div class="card-body">
                            <h3 class="card-title">{{ $book->tilte }}</h3>
                            <p class="card-text">{{ $book->short_decs }}</p>
                            <div class="card-footer d-flex justify-content-between">

                                {{--  @if (!$book->likes()->where('user_id', Auth::id())->first())
                                    <form method="post" action="{{ route('books.like', $book) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="bi bi-heart"></i></button>
                                    </form>
                                @else

                                 (!$book->likes()->where('user_id', Auth::id())->first())
                                    <form method="post" action="{{ route('books.dislike', $book) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-heart"></i></button>
                                    </form>
                                @endif  --}}
                                @php
                                    $existingLike = $book
                                        ->likes()
                                        ->where('user_id', Auth::id())
                                        ->first();
                                @endphp
                                @if (!$existingLike)
                                    <form method="post" action="{{ route('books.like', $book) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="bi bi-heart"></i></button>
                                    </form>
                                @endif

                                @if ($existingLike && $existingLike->is_like)
                                    <form method="post" action="{{ route('books.dislike', $book) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-heart"></i></button>
                                    </form>
                                @endif
                                @if ($existingLike && !$existingLike->is_like)
                                    <form method="post" action="{{ route('books.like', $book) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="bi bi-heart"></i></button>
                                    </form>
                                @endif


                                <a href="{{ route('book.show', $book->id) }}" class="btn btn-info">
                                    <i class="bi bi-chat"></i>
                                </a>
                                {{--  @if (Auth::user()->favoriteBooks->contains($book))
                                    <form method="post" action="{{ route('users.unmarkAsFavorite', $book) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Unmark as Favorite</button>
                                    </form>
                                @else
                                <form method="post" action="{{ route('users.markAsFavorite', ['user' => $user->id, 'book' => $book->id]) }}">

                                        @csrf
                                        <button type="submit" class="btn btn-success">Mark as Favorite</button>
                                    </form>
                                @endif  --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{$books->links()}}
            </div>
        </div>

    </div>
@endsection
