<div class="content-right-top">
    <h5 class="head">Popular</h5>
    @foreach($populars as $popular)
        <div class="active">
            <a href="{{ route('single', $popular->slug) }}">
                <div class="editor text-center">
                    <h3>{{ $popular->title }}</h3>
                    @if($popular->tags->count())
                        <p class="popular-tags">
                            @foreach($popular->tags as $tag)
                                <a href="#">{{ $tag->title }}</a>
                            @endforeach
                        </p>
                    @endif
                    <label>{{ $popular->getPostDate() }}</label>
                    <span></span>
                </div>
            </a>
        </div>
    @endforeach
</div>

