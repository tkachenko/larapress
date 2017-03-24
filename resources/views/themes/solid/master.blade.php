<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/theme/solid/assets/ico/favicon.ico">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="/theme/solid/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/theme/solid/assets/css/style.css" rel="stylesheet">
    <link href="/theme/solid/assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="/theme/solid/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/theme/solid/assets/js/modernizr.js"></script>
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{$blogname}}</a>
        </div>
        @if($pages)
            <div class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">

                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach($pages AS $page)
                                <li><a href="{{route('post', ['post_name' => $page->post_name])}}">{{$page->post_title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        @endif
    </div>
</div>

<div class="container mtb">
    <div class="row">

        <div class="col-lg-8">

            @yield('content')

        </div><! --/col-lg-8 -->

        <div class="col-lg-4">
            <h4>Search</h4>
            <div class="hline"></div>
            <form action="/search" method="get">
            <p>
                <br/>
                <input name="q" type="text" class="form-control" placeholder="Search something">
            </p>
            </form>

            <div class="spacing"></div>

            @if($categories)
                <h4>Categories</h4>
                <div class="hline"></div>
                    @foreach($categories AS $category)
                        <p><a href="{{route('category', ['slug' => $category->slug])}}"><i class="fa fa-angle-right"></i> {{$category->name}}</a> <span class="badge badge-theme pull-right">{{$category->count}}</span></p>
                    @endforeach
                <div class="spacing"></div>
            @endif

            @if($last_posts)
                <h4>Recent Posts</h4>
                <div class="hline"></div>
                <ul class="popular-posts">
                    <li>
                        <a href="#"><img src="assets/img/thumb01.jpg" alt="Popular Post"></a>
                        <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
                        <em>Posted on 02/21/14</em>
                    </li>
                </ul>
                <div class="spacing"></div>
            @endif

            @if($tags)
                <h4>Popular Tags</h4>
                <div class="hline"></div>
                <p>
                    @foreach($tags AS $tag)
                       <a class="btn btn-theme" href="{{route('tag', ['slug' => $tag->slug])}}" role="button"> {{$tag->name}}</a>
                    @endforeach
                </p>
            @endif
        </div>
    </div><! --/row -->
</div><! --/container -->


<!-- *****************************************************************************************************************
 FOOTER
 ***************************************************************************************************************** -->
<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>About</h4>
                <div class="hline-w"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <div class="col-lg-4">
                <h4>Social Links</h4>
                <div class="hline-w"></div>
                <p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-tumblr"></i></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Our Bunker</h4>
                <div class="hline-w"></div>
                <p>
                    Some Ave, 987,<br/>
                    23890, New York,<br/>
                    United States.<br/>
                </p>
            </div>

        </div><! --/row -->
    </div><! --/container -->
</div><! --/footerwrap -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/theme/solid/assets/js/bootstrap.min.js"></script>
<script src="/theme/solid/assets/js/retina-1.1.0.js"></script>
<script src="/theme/solid/assets/js/jquery.hoverdir.js"></script>
<script src="/theme/solid/assets/js/jquery.hoverex.min.js"></script>
<script src="/theme/solid/assets/js/jquery.prettyPhoto.js"></script>
<script src="/theme/solid/assets/js/jquery.isotope.min.js"></script>
<script src="/theme/solid/assets/js/custom.js"></script>


</body>
</html>