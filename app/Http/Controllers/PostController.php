<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::paginate(2),
        ]);
    }

    public function show(string $slug, Post $post): RedirectResponse|View
    {
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }

        return view('blog.show', [
            'post' => $post,
        ]);
    }

    public function store(FormPostRequest $request)
    {
        $post = Post::create($request->validated());

        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'article a été bien sauvegardé');
    }

    public function create(): View
    {
        $post = new Post;

        return view('blog.create', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post): View
    {

        return view('blog.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());

        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])
            ->with('success', 'Article mis à jour !');
    }
}
