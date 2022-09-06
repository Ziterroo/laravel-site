<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Sluggable\SlugOptions;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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

        Category::create($request->all());
        session()->flash('success', 'Категория успешно добавлена');
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $category)
    {
        \request()->validate([
            'title' => ['required', 'max:255', 'min:2'],
        ]);

        $category->update(\request()->all());
        session()->flash('success', 'Категория успешно обновлена');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        if ($category->posts->count()) {
            return redirect()->route('categories.index')->with('error', 'У категории есть посты, невозможно удалить!');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория успешно удалена');

    }
}
