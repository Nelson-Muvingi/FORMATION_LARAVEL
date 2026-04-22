@extends('base')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-2">Se connecter</h1>
            <p class="text-center text-gray-500 text-sm mb-6">Connectez-vous pour commencer</p>

            <form action="{{ route('auth.login') }}" method="post" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block mb-1.5 text-sm font-medium text-gray-700">Adresse email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') @enderror" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-1.5 text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password')  @enderror" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text-center py-2">
                    <p class="text-gray-600">
                        Vous n'avez un compte ? ?
                        <a href="{{ route('auth.register') }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold hover:underline transition duration-200">
                            Inscrivez-vous ici
                        </a>
                    </p>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition duration-200 transform hover:scale-[1.02]">
                    Se connecter
                </button>
            </form>
        </div>
    </div>
@endsection
