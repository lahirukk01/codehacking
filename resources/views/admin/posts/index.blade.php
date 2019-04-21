@extends('layouts.admin')


@section('content')

    @if(Session::has('actionResult'))
        <p class="bg-success">{{session('actionResult')}}</p>
    @endif
<h1>Posts</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>View Post</th>
                <th>View Comments</th>
                <th>Create At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->user->name}}</td>
                <td>{{$p->category ? $p->category->name : 'Not Categorised'}}</td>
                <td><img height="100px" src="{{$p->photo ? $p->photo->file : 'http://placehold.it/100x100'}}" alt=""></td>
                <td><a href="{{route('posts.edit', $p->id)}}">{{$p->title}}</a></td>
                <td><a href="{{route('home.post', $p->slug)}}">View</a></td>
                <td><a href="{{route('posts.show', $p->id)}}">View</a></td>
                <td>{{$p->created_at->diffForhumans()}}</td>
                <td>{{$p->updated_at->diffForhumans()}}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-4">
            {{$posts->links()}}
        </div>
    </div>

@endsection