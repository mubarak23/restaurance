@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card border-primary">
        <div class="row" style="margin:10px 0;">
            <div class="col-md-3">
                <img src="{{asset($product->image)}}" class="image" alt="Movie Poster">
            </div>
            <div class="col-md-4" style="margin: auto 0">
                <h5>{{ $product->name }}</h5>
                <h4><span class="badge badge-success">{{ $product->rating }}</span> Stars</h4>
                <h5>Rs. {{ $product->price }}</h5>
                <a href="{{ route('addtocart', ['id' => $product->id ]) }}" class="btn btn-info btn-sm">Add to cart</a>
            </div>
        </div>
    </div>
</div>


