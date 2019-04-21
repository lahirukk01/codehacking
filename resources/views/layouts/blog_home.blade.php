<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
{{--    <link href="css/blog-home.css" rel="stylesheet">--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="padding-top: 70px;">

<!-- Navigation -->
@include('includes.front_nav')

<div class="clearfix"></div>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

{{--            <h1 class="page-header">--}}
{{--                Page Heading--}}
{{--                <small>Secondary Text</small>--}}
{{--            </h1>--}}

            @yield('content')

            <div style="text-align: end;" class="row">
            {!! $posts->links() !!}
            </div>

            <!-- Pagination -->



{{--            <!-- Pager -->--}}
{{--            <ul class="pager">--}}
{{--                <li class="previous">--}}
{{--                    <a href="#">&larr; Older</a>--}}
{{--                </li>--}}
{{--                <li class="next">--}}
{{--                    <a href="#">Newer &rarr;</a>--}}
{{--                </li>--}}
{{--            </ul>--}}

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">

                            @if($categories)
                                @foreach($categories as $c)
                                <li><a href="#">{{$c->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    @include('includes.front_footer')

</div>
<!-- /.container -->

<!-- scripts -->
<script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
