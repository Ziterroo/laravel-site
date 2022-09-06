<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->orderByDesc('id')->paginate(5);

        return view('main.tag.single', compact('posts', 'tag'));
    }
}
