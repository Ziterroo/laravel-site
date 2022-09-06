<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index()
    {
        request()->validate([
            's' => ['required'],
        ]);

        $s = request()->s;
        $searchPosts = Post::findS($s)->paginate(5);
        return view('main.search.search', compact('s', 'searchPosts'));
    }
}
