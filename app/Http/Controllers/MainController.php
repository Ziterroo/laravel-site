<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderByDesc('id')->paginate(6);
        return view('main.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views += 1;
        $post->update();

        return view('main.news.single', compact('post'));
    }
}
