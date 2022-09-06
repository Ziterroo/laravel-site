@extends('main.layouts.main')

@section('title', 'TecNews category')

@section('content')

    <div class="content">
        <div class="col-md-7 content-left">
            <h5 class="head">По тегу {{ $tag->title }}</h5>
                @foreach($posts as $post)
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
            {{ $posts->links() }}
        </div>
                <div class="col-md-5 content-right">
                @include('main.category.popular')
                @include('main.category.all-category')
                </div>
        <div class="clearfix"></div>


        <div class="clearfix"></div>
    </div>
    </div>
@endsection
