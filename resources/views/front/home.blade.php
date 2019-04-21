@extends('layouts.blog_home')

@section('content')

    @if($posts)
        @foreach($posts as $p)
            <!-- First Blog Post -->
            <h2>
                <a href="#">{{$p->title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{$p->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> {{$p->created_at}}</p>
            <hr>
            <img class="img-responsive" src="{{$p->photo ? $p->photo->file : 'http://placehold.it/400x300'}}" alt="">
            <hr>
            <p>{!! $p->body !!}</p>
            <a class="btn btn-primary" href="{{route('home.post', $p->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

        @endforeach
    @endif

@endsection
