@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">

            {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostController@update', $post->id], 'files' => true]) !!}

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

            {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostController@destroy', $post->id]]) !!}
            {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}

            @include('includes.ckeditor')
        </div>
    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection