@extends('base')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-2">Créer un compte</h1>
            <p class="text-center text-gray-500 text-sm mb-6">Inscrivez-vous pour commencer</p>

            <form action="{{ route('auth.register') }}" method="post" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block mb-1.5 text-sm font-medium text-gray-700">Nom complet</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block mb-1.5 text-sm font-medium text-gray-700">Adresse email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-1.5 text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block mb-1.5 text-sm font-medium text-gray-700">
                        Confirmer le mot de passe
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div class="text-center py-2">
                    <p class="text-gray-600">
                        Déjà inscrit ?
                        <a href="{{ route('auth.login') }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold hover:underline transition duration-200">
                            Se connecter
                        </a>
                    </p>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition duration-200 transform hover:scale-[1.02]">
                    S'inscrire
                </button>
            </form>
        </div>
    </div>
@endsection
