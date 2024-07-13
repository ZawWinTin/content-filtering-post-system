<?php

namespace App\Repositories\General;

use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository
{
    public function getAll()
    {
        $posts = Post::with([
            'user',
        ])
            ->latest()
            ->paginate();

        return compact('posts');
    }

    public function show($id)
    {
        $post = Post::with([
            'user',
        ])
            ->findOrFail($id);

        return compact('post');
    }

    public function create(Request $request)
    {
        $post = $this->save($request);

        return compact('post');
    }

    public function update(Request $request)
    {
        $post = $this->save($request);

        return compact('post');
    }

    protected function save(Request $request)
    {
        return Post::updateOrCreate(
            ['id' => $request->id],
            [
                'user_id' => auth()->id(),
                'content' => $request->content,
            ],
        );
    }
}
