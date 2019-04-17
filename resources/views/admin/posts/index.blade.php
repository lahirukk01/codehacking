@extends('layouts.admin')


@section('content')

<h1>Posts</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
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
                <td>{{$p->title}}</td>
                <td>{{$p->body}}</td>
                <td>{{$p->created_at->diffForhumans()}}</td>
                <td>{{$p->updated_at->diffForhumans()}}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection