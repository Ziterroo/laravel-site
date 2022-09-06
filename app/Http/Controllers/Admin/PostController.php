<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['tags', 'category'])->orderByDesc('id')->paginate(20);
        return view('admin.posts.index', compact('posts')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'content' => ['required'],
            'category_id' => ['integer', 'integer '],
            'image' => ['image', 'nullable'],
        ]);
        $data = $request->all();
        $data['image'] = Post::uploadImage($request);

        $post = Post::create($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья успешно добавлена!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'content' => ['required'],
            'category_id' => ['integer', 'integer '],
            'image' => ['image', 'nullable'],
        ]);
        $data = $request->all();
        if ($file = Post::uploadImage($request, $post->image)) {
            $data['image'] = $file;
        }

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья успешно редактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Статья успешно удалена');
    }
}
