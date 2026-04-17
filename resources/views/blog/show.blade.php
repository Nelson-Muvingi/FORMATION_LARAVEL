@extends('base')

@section('title', $post->title)


@section('content')

    <article class="flex flex-col justify-center space-y-4 m-5">
        <h2 class="text-2xl font-bold text-slate-700">{{ $post->title }}</h2>
        <p class="text-xl font-medium">{{ $post->content }}</p>
        <p>
            <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Lire la suite</a>
        </p>
    </article>

@endsection
