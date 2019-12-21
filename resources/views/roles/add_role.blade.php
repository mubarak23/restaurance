@extends('layouts.app')

@section('title', '| Create Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Add Permission</h1>
    <br>

    

    <form method="post" action = {{ route('permissions.create')}}>
    <br>
    @if(!$roles->isEmpty()) //If no roles exist yet
        <h4>Assign Permission to Roles</h4>

        <div class="form-check">
         @foreach ($permissions as $permission)
        <input class="form-check-input" type="checkbox" value={{ $permission->id }} id={{ $permission->id }}>
        <label class="form-check-label" for={{ $permission->name }}>
            {{ ucfirst($permission->name)) }}
        </label>
        @endforeach
        </div>
    @endif
    <br>
     {{ csrf_filed() }}
        <button type="submit" class="btn btn-primary" name="submit">Add Role</button> 

</div>

@endsection