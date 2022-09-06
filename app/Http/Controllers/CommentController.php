<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store($postId)
    {
        $data = \request()->validate([
            'author' => ['required', 'min:2', 'max:150'],
            'description' => ['required', 'min:2']
        ]);
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $postId;
        $comment = new Comment();
        $comment->create($data);
        return back()->with('success', 'Комментарий успешно добавлен!');
    }
}
