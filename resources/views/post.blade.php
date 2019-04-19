@extends('layouts.blog_post')

@section('content')


<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

<hr>

<!-- Post Content -->

<p>{{$post->body}}</p>

<hr>

<!-- Blog Comments -->

@if(Auth::check())
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    {!! Form::open(['method' => 'POST', 'action' => 'PostCommentController@store']) !!}

    <input type="hidden" name="post_id" value="{{$post->id}}">

    <div class="form-group">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>

        {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>

<hr>

@endif

<!-- Posted Comments -->

<!-- Comment -->
@if(count($comments) > 0)
    @foreach($comments as $c)
        @if($c->is_active != 0)
<div class="media">
    <a class="pull-left" href="#">
        <img height="50px" class="media-object" src="{{$c->user->photo ? $c->user->photo->file : 'http://placehold.it/64x64'}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$c->user->name}}
            <small>{{$c->created_at}}</small>
        </h4>
        <p>{{$c->body}}</p>


        @foreach($c->replies as $r)
            @if($r->is_active)
        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="40px" class="media-object" src="{{$r->user->photo ? $r->user->photo->file : 'http://placehold.it/64x64'}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$r->user->name}}
                    <small>{{$r->created_at}}</small>
                </h4>
                <p>{{$r->body}}</p>
            </div>
        </div>
        <!-- End Nested Comment -->
            @endif
        @endforeach


        @if(Auth::check())
        {!! Form::open(['method' => 'POST', 'action' => 'CommentReplyController@storeReply']) !!}

            <input type="hidden" name="comment_id" value="{{$c->id}}">

        <div class="form-group">
            {!! Form::label('reply', 'Reply') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        @endif
    </div>
</div>
        @endif
    @endforeach

@endif


@endsection