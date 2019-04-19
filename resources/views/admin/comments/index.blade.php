@extends('layouts.admin')

@section('content')

    @if(count($comments) > 0)

    <h1>All Comments</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>View Post</th>
                <th>View Replies</th>
                <th>Approval</th>
                <th>Delete Comment</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comments as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->author}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->body}}</td>
                <td><a href="{{route('home.post', $c->post->id)}}">View</a></td>
                <td><a href="{{route('replies.show', $c->id)}}">View</a></td>
                <td>
                @if($c->is_active == 0)

                    {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentController@update', $c->id]]) !!}
                        <input type="hidden" name="is_active" value="1">
                    {!! Form::submit('Approve ', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}

                @else

                    {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentController@update', $c->id]]) !!}
                    <input type="hidden" name="is_active" value="0">
                    {!! Form::submit('Disapprove ', ['class' => 'btn btn-info']) !!}
                    {!! Form::close() !!}

                @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentController@destroy', $c->id]]) !!}
                    {!! Form::submit('Delete Comment', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <h1>No Comments</h1>
    @endif

@endsection