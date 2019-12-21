@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h3 class="description"> Recommended Products for You </h3><br>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 col-6 mar">
            <a href="{{ URL::to('product/'.$product->id.'/show')}}"><img src="{{ $product->image }}" class="image" alt="Product Poster"></a>
            <div class="description">
                <b>{{ $product->name}}</b><span class="badge badge-success"> {{ $product->rating }} </span>
                <br>Rs. {{ $product->price }}
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
