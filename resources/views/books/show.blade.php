@extends('layouts.app')
@section('content')
<section style="background-color: #eee;">
    <div class="container my-5 py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="card">
            {{--  <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong me-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                  height="60" />
                <div>
                  <h6 class="fw-bold text-primary mb-1">{{auth()->user()->name}}</h6>
                  <p class="text-muted small mb-0">

                  </p>
                </div>
              </div>

              <p class="mt-3 mb-4 pb-2">

              </p>
            </div>  --}}
            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
             <form action="{{route('comment.store')}}" method="POST">
                @csrf
                <div class="d-flex flex-start w-100">
                    <img class="rounded-circle shadow-1-strong me-3"
                      src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                      height="40" />
                      <input  type="hidden" name="book_id" value="{{$book->id}}">
                    <div class="form-outline w-100">
                        <label class="form-label" for="textAreaExample">Message</label>
                      <textarea class="form-control" id="textAreaExample" name="comment" rows="4"
                        style="background: #fff;"></textarea>
                    </div>
                  </div>
                  <div class="float-end mt-2 pt-1">
                    <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                  </div>
             </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
