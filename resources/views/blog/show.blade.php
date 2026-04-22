@extends('base')

@section('title', $post->title)


@section('content')

    <article class="flex flex-col justify-center space-y-4 m-5">
        <h2 class="text-xl font-bold text-slate-700">{{ $post->title }}</h2>

        <p class="text-sm">
            @if ($post->category)
                Categorie : <strong>{{ $post->category?->name }}</strong>
                @if (!$post->tags->isEmpty())
                    ,
                @endif
            @endif
            @if (!$post->tags->isEmpty())
                Tags :
                @foreach ($post->tags as $tag)
                    <span class="text-sm text-white bg-gray-600 mx-0.5 rounded p-1">
                        {{ $tag->name }}
                    </span>
                @endforeach
            @endif
        </p>

        @if ($post->image)
            <div class="my-4 group relative">
                <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}"
                    class="w-full max-w-sm h-auto rounded-xl shadow-md group-hover:shadow-xl transition-all duration-300">

            </div>
        @endif
        <p class="text-xl font-medium">{{ $post->content }}</p>
        <button class="w-fit py-2 px-4 bg-blue-700 rounded text-white cursor-pointer">
            <a href="{{ route('blog.edit', ['slug' => $post->slug, 'post' => $post->id]) }}">Modifier</a>
        </button>
    </article>

@endsection
