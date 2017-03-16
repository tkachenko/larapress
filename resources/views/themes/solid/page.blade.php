@extends($themefolder.'master')

@section('content')

    <h1>{{$article->post_title}}</h1>

    @if($article->image)
        <p><img class="img-responsive" src="{{$article->image}}"></p>
    @endif

    <p>
        {!! $article->post_content !!}
    </p>
    <div class="spacing"></div>

@endsection

