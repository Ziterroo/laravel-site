@extends('main.layouts.main')

@section('title', 'TecNews category')

@section('content')

    <div class="content">
        <div class="col-md-7 content-left">
            @if($searchPosts->count())
                <h5 class="head">Поиск по запросу {{ substr($s, 0, 30) }}</h5>
                @foreach($searchPosts as $post)
                    <div class="article">
                        <p class="span" style="margin-left: 25px">
                            <a href="{{ route('categories.single', $post->category->slug) }}">{{ $post->category->title }}</a>
                        </p>
                        <a class="title" href="{{ route('single', $post->slug) }}">{{ $post->title }}</a>
                        <a href="{{ route('single', $post->slug) }}"><img src="{{ $post->defaultImage() }}" alt=""/></a>
                        <p>{!!  $post->description !!} </p>
                        <p class="span" style="margin-left: 25px">
                            {{ $post->getPostDate() }} |
                            views: {{ $post->views }}
                        </p>
                    </div>
                @endforeach
                {{ $searchPosts->appends('s', $s)->links() }}
            @else
                <div class="alert alert-danger" style="margin-top: 30px;">Новости по запросу <b>{{ $s }}</b> не найдено</div>
            @endif
        </div>
        <div class="col-md-5 content-right">
            @include('main.category.popular')
        </div>
        <div class="clearfix"></div>


        <div class="clearfix"></div>
    </div>
    </div>
@endsection
