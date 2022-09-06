@extends('main.layouts.main')

@section('title', 'TecNews ' . $post->title)

@section('content')
    <div class="container" style="margin-bottom: 30px; border-bottom: 1px solid #000">
        <div class="header-bottom">
            <span class="menu"></span>
            <div class="list-nav">
                <ul>
                    <li><a href="{{ route('home') }}">Главаня</a></li>
                    |
                    <li>
                        <a href="{{ route('categories.single', $post->category->slug) }}">{{ $post->category->title }}</a>
                    </li>
                    |
                    <li><a class="active">{{ substr($post->title, 0, 50)}}</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="content">
        <div class="single-page">
            <div class="print-main">
                <h3>{{ $post->title }}</h3>
                <p class="sub_head">views: {{ $post->views }} | {{ $post->created_at }}</p>
                <img src="{{ $post->defaultImage() }}" class="img-responsive" alt=""/>
                <p class="ptext">{!! $post->content !!}</p>
                <p class="span">
                    @isset($post->tags)
                        @foreach($post->tags as $tag)
                            <a href="{{ route('tags.single', $tag->slug) }}">{{ $tag->title }} </a>
                        @endforeach
                    @endisset
                </p>
            </div>
        </div>
        <div class="col-md-7 single-content-left">
            <div class="single">
                @auth()
                    <div class="leave">
                        <h4>Leave a comment</h4>
                    </div>

                    <form id="commentform" action="{{ route('comment.store', $post->id) }}" method="POST">
                        @csrf
                        <p class="comment-form-author-name"><label for="author">Name</label>
                            <input id="author" name="author" type="text" size="30" aria-required="true"
                                   value="@if (\Illuminate\Support\Facades\Auth::check()) {{ \Illuminate\Support\Facades\Auth::user()->name }} @endif">
                        </p>
                        <p class="comment-form-comment">
                            <label for="comment">Comment</label>
                            <textarea name="description">{{ old('description') }}</textarea>
                        </p>
                        <div class="clearfix"></div>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" value="Send">
                        </p>
                        <div class="clearfix"></div>
                    </form>
                @endauth

                <div class="comments1">
                    <h4>COMMENTS</h4>
                    @if($post->comments->count())
                        @foreach($post->comments as $comment)
                            <div class="comments-main">
                                <div class="col-md-3 cmts-main-left">
                                    <img src="{{ asset('public/assets/main/img/avatar.jpg') }}" alt="">
                                </div>
                                <div class="col-md-9 cmts-main-right">
                                    <h5>{{ $comment->author}}</h5>
                                    <p>{{ $comment->description }}</p>
                                    <div class="cmts">
                                        <div class="col-md-6 cmnts-left">
                                            <p>{{ $comment->created_at->diffForHumans()}}</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5 content-right content-right-top">
            @include('main.category.popular')
            @include('main.category.all-category')
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
