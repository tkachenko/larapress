@extends($themefolder.'master')

@section('content')

    <h1>{{$article->post_title}}</h1>

    <p><img class="img-responsive" src="{{$article->image}}"></p>
    <p><csmall>Posted: {{date("M d Y", strtotime($article->post_date))}}</csmall></p>
    <p>
        {!! $article->post_content !!}
    </p>
    <div class="spacing"></div>

@endsection

