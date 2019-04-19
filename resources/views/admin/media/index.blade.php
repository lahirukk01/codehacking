@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Created</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @if('$photos')
            @foreach($photos as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td><img height="100px" src="{{$p->file}}" alt=""></td>
                <td>{{$p->created_at ? $p->created_at->diffForhumans() : 'No date'}}</td>
                <td>

                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediaController@destroy', $p->id]]) !!}
                    {!! Form::submit('Delete Photo', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection