@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Delivery Option</h5>
                    <p class="card-text">How would you like to handle your delivery?.</p>
                    @foreach($methods as $method)
                    <div class="form-check center">
                        <a href="" class="btn btn-info">{{ $method->name }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
