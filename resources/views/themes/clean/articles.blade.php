@extends($themefolder.'master')

@section('content')


    @if(isset($head_title))
        <header class="intro-header" style="background-image: url('/theme/clean/img/home-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>{{$head_title}}</h1>
                            @if($head_about) <hr class="small"> <span class="subheading">{{$head_about}}</span> @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endif

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($articles AS $article)

                <div class="post-preview">
                    @if($article->image)
                        <p><img class="img-responsive" src="{{$article->image}}"></p>
                    @endif
                    <a href="{{route('post', ['post_name' => $article->post_name])}}">
                        <h2 class="post-title">
                            {{$article->post_title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$article->post_intro}}
                        </h3>
                    </a>
                    <p class="post-meta"> @foreach($article['terms'] AS $article_term) <a href="{{\App\Models\Links::linkToTerm($article_term)}}">#{{$article_term->name}}</a> @endforeach <br> {{date("d M Y", strtotime($article->post_date))}}</p>
                </div>
                <hr>
            @endforeach
                <!-- Pager -->
                <ul class="pager">
                    {!! $pager->render() !!}
                </ul>
            </div>
        </div>
    </div>


@endsection

