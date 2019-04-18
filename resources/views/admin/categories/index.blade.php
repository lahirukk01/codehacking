@extends('layouts.admin')



@section('content')

<h1>Categories</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoryController@store']) !!}

            <div class="form-group">
                {!! Form::label('category', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

        <div class="col-sm-6">

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created Date</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td><a href="{{route('categories.edit', $c->id)}}">{{$c->name}}</a></td>
                        <td>{{$c->created_at ? $c->created_at->diffForhumans() : 'No date'}}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection