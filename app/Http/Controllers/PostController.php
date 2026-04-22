<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\View\View;
use App\Http\Requests\FormPostRequest;
use App\Models\{Category, Post, Tag, User};

class PostController extends Controller
{
    public function index(): View
    {
        // dd(Auth::user());

        return view('blog.index', [
            'posts' => Post::with(['tags', 'category'])->paginate(10),
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
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'article a été bien sauvegardé');
    }

    public function create(): View
    {
        $post = new Post;

        return view('blog.create', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    public function edit(Post $post): View
    {

        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])
            ->with('success', 'Article mis à jour !');
    }
}
