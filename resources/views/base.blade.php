<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>
    <header>
        <!-- Navbar simple -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between gap-4 items-center h-16">
                    <!-- Logo -->
                    <div class="text-xl font-semibold text-gray-800">
                        Blog
                    </div>

                    <!-- Menu desktop -->
                    <div class="hidden md:flex space-x-6">
                        <a href="{{ route('blog.index') }}"
                            class="px-3 py-2 rounded-md transition duration-200
    @if (request()->route()->getName() === 'blog.index') bg-blue-600
    @else
        text-gray-700 hover:bg-gray-100 hover:text-blue-600 @endif">
                            Accueil
                        </a>
                        <a href="{{ route('blog.create') }}"
                            class="px-3 py-2 rounded-md transition duration-200
    @if (request()->route()->getName() === 'blog.create') bg-blue-600
    @else
        text-gray-700 hover:bg-gray-100 hover:text-blue-600 @endif">
                            Create
                        </a>


                    </div>

                    <a href="compte/connexion"
                        class="hidden md:block w-fit m-2 ml-4 mb-4 rounded-xl bg-teal-500 py-3 px-4 text-white hover:bg-teal-600 transition font-medium">Connexion</a>

                    <!-- Menu mobile (hamburger) -->
                    <div class="md:hidden">
                        <button id="menu-btn" class="text-gray-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Menu mobile déroulant -->
            <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg p-2">
                <a href="{{ route('blog.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Accueil</a>
                <a href="{{ route('blog.create') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Create</a>

                <a href="compte/connexion"
                    class="block w-fit m-2 ml-4 mb-4 rounded bg-teal-500 py-2.5 px-4 text-white hover:bg-teal-600 transition">Connexion</a>
            </div>
        </nav>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="max-w-sm bg-green-500/50 text-green-900 p-2 mt-5 mx-5">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

    <script>
        // Script pour le menu mobile
        const btn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
