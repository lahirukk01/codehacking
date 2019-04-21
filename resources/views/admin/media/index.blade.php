@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <form action="{{route('media.bulkMediaDelete')}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}

        <input type="submit" value="Delete" class="btn btn-danger">
        
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="media-select-all"></th>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Created</th>
    {{--                <th>Delete</th>--}}
                </tr>
            </thead>
            <tbody>
            @if('$photos')
                @foreach($photos as $p)
                <tr>
                    <td><input type="checkbox" class="select-media-checkbox" name="mediaCheckboxArray[]" value="{{$p->id}}" id=""></td>
                    <td>{{$p->id}}</td>
                    <td><img height="100px" src="{{$p->file}}" alt=""></td>
                    <td>{{$p->created_at ? $p->created_at->diffForhumans() : 'No date'}}</td>
    {{--                <td>--}}

    {{--                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediaController@destroy', $p->id]]) !!}--}}
    {{--                    {!! Form::submit('Delete Photo', ['class' => 'btn btn-danger']) !!}--}}
    {{--                    {!! Form::close() !!}--}}

    {{--                </td>--}}
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </form>

@endsection


@section('scripts')

    <script>

        $(document).ready(function () {


            $('#media-select-all').click(function () {

                $('.select-media-checkbox').prop('checked', $(this).prop('checked'))
            })


        })


    </script>

@endsection