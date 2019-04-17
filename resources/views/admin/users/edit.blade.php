@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">

            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUserController@update', $user->id], 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role Id') !!}
                {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('file', 'File') !!}
                {!! Form::file('file', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUserController@destroy', $user->id]]) !!}
            {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
    @include('includes.form_errors')
    </div>

@endsection