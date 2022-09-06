<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
        ]);

        Tag::create($request->all());
        return redirect()->route('tags.index')->with('success', 'Тег успешно добавлен!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Tag $tag)
    {
        \request()->validate([
            'title' => ['required', 'max:255', 'min:2'],
        ]);

        $tag->update(request()->all());
        return redirect()->route('tags.index')->with('success', 'Тег успешно редактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tag $tag)
    {
        if ($tag->posts->count()) {
            return redirect()->route('tags.index')->with('error', 'У тега есть посты, невозможно удалить!');
        }
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Тег успешно удален');
    }
}
