@extends('layouts.admin')



@section('content')

    @if(Session::has('actionResult'))
    <p class="bg-success">{{session('actionResult')}}</p>
    @endif

<h1>Users</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Updated Date</th>
        </tr>
    </thead>
    <tbody>
    @if($users)
        @foreach($users as $u)
        <tr>
            <td>{{$u->id}}</td>
            <td><img height="100px" src="{{$u->photo ? $u->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('users.edit', $u->id)}}">{{$u->name}}</a></td>
            <td>{{$u->email}}</td>
            <td>{{$u->role->name}}</td>
            <td>{{$u->is_active == 0 ? 'Inactive' : 'Active'}}</td>
            <td>{{$u->created_at->diffForHumans()}}</td>
            <td>{{$u->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
</table>

@endsection