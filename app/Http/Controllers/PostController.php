<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return Post::paginate(25);
    }

    public function show(string $slug, string $id): RedirectResponse|Post
    {
        $post = Post::findOrFail($id);

        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return $post;
    }
}
