@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add User</h1>
    <hr>

    <form method="post" action = {{ route('users.create')}}>
        <div class="form-group">
            <label for="product name">UserName</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Username Here"  />
        </div>
        <div class="form-group">
            <label for="Email Address">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Enter Email Address"  />
        </div>

        <div class="form-group">
         @foreach ($roles as $role)
            <label for="role">Email</label>
            <input type="checkbox" name="email" class="form-control"  />
         @endforeach
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password"  />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password"  />
        </div>
          {{ csrf_filed() }}
        <button type="submit" class="btn btn-primary" name="submit">Add Product</button>       
    </form>
</div>

@endsection