<div class="editors-pic-grids">
    <h5>All categories</h5>
    <div class="editors-pic">
        <div class="e-pic-info" style="margin-left: 15px; font-size: 15px">
            <p class="span">
                @foreach($categories as $category)
                    <a href="{{ route('categories.single', $category->slug) }}">{{ $category->title }} ({{ $category->posts_count }})</a>
                @endforeach
            </p>
            <span></span>
        </div>
        <div class="clearfix"></div>
    </div>

</div>
