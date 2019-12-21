@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card border-primary">
        <div class="row" style="margin:10px 0;">
            <div class="col-md-8 col-md-offset-4">
                <form method="post" action = {{ route('product.create')}}>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="product name">Product Name</label>
                        <input type="text" name="name" class="form-control"  />
                    </div>
                    <div class="form-control">
                        <label for="price">Product Price</label>
                        <input type="number" name="price" class="form-control" />
                    </div>
                    <div class="form-control">
                       <label for="product Image">Image</label>
                       <input type="file" name="image" class="form-control" />
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
