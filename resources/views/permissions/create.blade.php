@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Add Permission</h1>
    <br>

    {{ Form::open(array('url' => 'permissions')) }}

    <form method="post" action = {{ route('permissions.create')}}>
    <br>
    @if(!$roles->isEmpty()) //If no roles exist yet
        <h4>Assign Permission to Roles</h4>

        <div class="form-check">
         @foreach ($roles as $role)
        <input class="form-check-input" type="checkbox" value="" id={{ $role->id }}>
        <label class="form-check-label" for={{ $role->name }}>
            {{ ucfirst($role->name)) }}
        </label>
        @endforeach
        </div>
    @endif
    <br>
     {{ csrf_filed() }}
        <button type="submit" class="btn btn-primary" name="submit">Add Permission</button> 

</div>

@endsection