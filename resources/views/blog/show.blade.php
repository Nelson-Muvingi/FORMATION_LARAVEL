@extends('base')

@section('title', $post->title)


@section('content')

    <article class="flex flex-col justify-center space-y-4 m-5">
        <h2 class="text-2xl font-bold text-slate-700">{{ $post->title }}</h2>
        <p class="text-xl font-medium">{{ $post->content }}</p>
        <button class="w-fit py-2 px-4 bg-blue-700 rounded text-white cursor-pointer">
            <a href="{{ route('blog.edit', ['slug' => $post->slug, 'post' => $post->id]) }}">Modifier</a>
        </button>
    </article>

@endsection
