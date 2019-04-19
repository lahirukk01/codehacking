@extends('layouts.admin')

@section('content')

    @if(count($replies) > 0)

        <h1>Comment Replies</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>View Post</th>
                <th>Approval</th>
                <th>Delete Reply</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->user->name}}</td>
                    <td>{{$r->user->email}}</td>
                    <td>{{$r->body}}</td>
                    <td><a href="{{route('home.post', $r->comment->post->id)}}">View</a></td>
                    <td>
                        @if($r->is_active == 0)

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentReplyController@update', $r->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Approve ', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentReplyController@update', $r->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Disapprove ', ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}

                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['CommentReplyController@destroy', $r->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>{{$r->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1>No Replies</h1>
    @endif

@endsection