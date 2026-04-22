@extends('base')

@section('title', 'Accueil du blog')

@section('content')
    <h1 class="text-2xl m-5 font-bold text-gray-800 mb-2">Mon Blog</h1>
    @foreach ($posts as $post)
        <article class="m-2 flex flex-col space-y-2">
            <h2 class=" text-xl font-bold text-slate-700">{{ $post->title }}</h2>
            @if ($post->image)
                <div class="my-4 group relative">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}"
                        class="w-60 max-w-sm h-60 object-cover rounded-xl shadow-md group-hover:shadow-xl transition-all duration-300">

                </div>
            @endif
            {{-- <p>{{ $post->content }}</p> --}}
            <p class="w-fit py-2 px-4 bg-blue-700 rounded text-white cursor-pointer">
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Voir plus</a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection
