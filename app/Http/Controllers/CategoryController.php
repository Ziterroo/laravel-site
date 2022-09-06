<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderByDesc('id')->paginate(5);
        return view('main.category.single', compact('posts', 'category'));
    }
}
