@extends($themefolder.'master')

@section('content')


    <header class="intro-header" style="background-image: url('@if($article['image']){{$article['image']}}@else /theme/clean/img/post-bg.jpg @endif')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{$article->post_title}}</h1>
                        <span class="meta">Posted on {{date("M d Y", strtotime($article->post_date))}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! $article->post_content !!}

                    <p class="post-meta"> @foreach($article['terms'] AS $article_term)<a href="{{\App\Models\Links::linkToTerm($article_term)}}"> #{{$article_term->name}}</a> @endforeach </p>

                </div>
            </div>

        </div>

    </article>


@endsection

