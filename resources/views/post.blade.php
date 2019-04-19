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
        <img class="media-object" src="" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$c->author}}
            <small>{{$c->created_at}}</small>
        </h4>
        <p>{{$c->body}}</p>
    </div>
</div>
        @endif
    @endforeach

@endif

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!-- End Nested Comment -->
    </div>
</div>


@endsection