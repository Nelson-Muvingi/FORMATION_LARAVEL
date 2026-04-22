@extends('base')

@section('content')
    <h1>Se connecter</h1>
    <form action="{{ route('auth.login') }}" method="post" class="max-w-sm space-y-4 my-6 mx-auto">
        @csrf
        <div>
            <label for="name" class="block mb-1.5 text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="bg-neutral-100 border text-sm rounded block w-full px-2.5 py-2 shadow-xs" />
            @error('email')
                {{ $message }}
            @enderror
        </div>

        <div>
            <label for="password" class="block mb-1.5 text-sm font-medium">Mot de passe</label>
            <input type="password" id="password" name="password"
                class="bg-neutral-100 border text-sm rounded block w-full px-2.5 py-2 shadow-xs" />
            @error('password')
                {{ $message }}
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition cursor-pointer">
            Se connecter
        </button>
    </form>
@endsection
