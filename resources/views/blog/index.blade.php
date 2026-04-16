@extends('base')

@section('title', 'Accueil du blog')

@section('content')
    <h1>Mon Blog</h1>
    @foreach ($posts as $post)
        <article class="m-5 flex flex-col space-y-2">
            <h2 class=" text-2xl font-bold text-slate-700">{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p class="w-fit py-2 px-4 bg-blue-700 rounded text-white cursor-pointer">
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'id' => $post->id]) }}">Lire la suite</a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection
