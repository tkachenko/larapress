@extends($themefolder.'master')

@section('content')


    <header class="intro-header" style="background-image: url('@if($article->image){{$article->image}}@else /theme/clean/img/post-bg.jpg @endif')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{$article->post_title}}</h1>
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
                </div>
            </div>
        </div>


    </article>


@endsection

