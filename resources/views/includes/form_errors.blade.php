
@if($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>

@endif