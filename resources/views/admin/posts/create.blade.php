@extends('layouts.admin')


@section('content')

    <div class="row">
        <h1>Create Post</h1>

        {!! Form::open(['method' => 'POST', 'action' => 'AdminPostController@store', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category') !!}
            {!! Form::select('category_id', ['' => 'Select Category'] + $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file', 'Photo') !!}
            {!! Form::file('file', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    </div>

    <div class="row">
    @include('includes.form_errors')
    </div>

@endsection