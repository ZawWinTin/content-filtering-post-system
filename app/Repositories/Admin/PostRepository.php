<?php

namespace App\Repositories\Admin;

use App\Models\Post;

class PostRepository
{
    public function getAll()
    {
        $posts = Post::with([
            'user',
        ])
            ->withTrashed()
            ->latest()
            ->paginate(request('limit') ?: Post::withTrashed()->count());

        return compact('posts');
    }

    public function show($id)
    {
        $post = Post::with([
            'user',
        ])
            ->withTrashed()
            ->findOrFail($id);

        return compact('post');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        $post->restore();
    }
}
