<?php

namespace App\Repositories\Admin;

use App\Models\User;

class UserRepository
{
    public function getAll()
    {
        $users = User::withTrashed()
            ->latest()
            ->paginate(request('limit') ?: User::withTrashed()->count());

        return compact('users');
    }

    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        return compact('post');
    }

    public function getPosts($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $posts = $user->posts()
            ->withTrashed()
            ->latest()
            ->paginate(request('limit') ?: $user->posts()->count());

        return compact('posts');
    }

    public function destroy($id)
    {
        $post = User::findOrFail($id);

        $post->delete();
    }

    public function restore($id)
    {
        $post = User::onlyTrashed()->findOrFail($id);

        $post->restore();
    }
}
