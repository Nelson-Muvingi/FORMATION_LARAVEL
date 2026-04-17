<form action="" method="post" class="max-w-sm space-y-4 my-6 mx-auto">
    @csrf
    @method($post->id ? 'PATCH' : 'POST')
    <div>
        <label for="name" class="block mb-1.5 text-sm font-medium">Titre de l'article</label>
        <input type="text" id="name" name="title" value="{{ old('title', $post->title) }}"
            class="bg-neutral-100 border text-sm rounded block w-full px-2.5 py-2 shadow-xs" />
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="slug" class="block mb-1.5 text-sm font-medium">Titre du slug</label>
        <input type="text" id="slug" name="slug" value="{{ old('title', $post->slug) }}"
            class="bg-neutral-100 border text-sm rounded block w-full px-2.5 py-2 shadow-xs" />
        @error('slug')
            {{ $message }}
        @enderror
    </div>

    <div>
        <label for="content" class="block mb-1.5 text-sm font-medium" class="block mb-1.5 text-sm font-medium">Contenu
            de l'article</label>
        <textarea name="content" id="content"
            class="bg-neutral-100 border text-sm rounded block w-full px-2.5 py-2 shadow-xs">{{ old('content', $post->content) }}</textarea>
        @error('content')
            {{ $message }}
        @enderror
    </div>

    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition cursor-pointer">
        @if ($post->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
