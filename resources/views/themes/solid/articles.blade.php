@extends($themefolder.'master')

@section('content')

    @foreach($articles AS $article)
        @if($article->image)
            <p><img class="img-responsive" src="{{$article->image}}"></p>
        @endif
        <a href="{{$article->post_name}}"><h3 class="ctitle">{{$article->post_title}}</h3></a>
        <p><csmall>Posted: {{date("d M Y", strtotime($article->post_date))}}</csmall></p>
        <p>{{$article->post_intro}}</p>
        <p><a href="{{$article->post_name}}">[Read More]</a></p>
        <div class="hline"></div>

        <div class="spacing"></div>

    @endforeach

    <div class="text-center">
        {!! $pager->render() !!}
    </div>

@endsection

