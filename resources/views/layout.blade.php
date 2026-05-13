<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'ArtVerse') }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-gray-900 via-black to-gray-800 min-h-screen text-white overflow-x-hidden flex flex-col">

    <!-- Background Glow Effects -->
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>

        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl"></div>

        <div class="absolute top-1/2 left-1/2 w-80 h-80 bg-pink-500/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>

    </div>

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="flex-grow pt-32 px-6">
        @include('components.flash')

        {{ $slot ?? '' }}

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-20 px-6 pb-8">
        <div class="max-w-7xl mx-auto">

            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl px-8 py-6 shadow-2xl">

                <div class="flex flex-col md:flex-row items-center justify-between gap-6">

                    <!-- Logo / Branding -->
                    <div>
                        <h2 class="text-2xl font-bold text-white">
                            ArtVerse
                        </h2>

                        <p class="text-white/60 text-sm mt-1">
                            Empowering local artists through digital creativity.
                        </p>
                    </div>

                    <!-- Footer Links -->
                    <div class="flex items-center gap-6 text-sm">

                        <a href="{{ route('home') }}"
                           class="text-white/70 hover:text-white transition">
                            Home
                        </a>

                        <a href="{{ route('gallery') }}"
                           class="text-white/70 hover:text-white transition">
                            Gallery
                        </a>

                        <a href="{{ route('artists.index') }}"
                           class="text-white/70 hover:text-white transition">
                            Artists
                        </a>

                        <a href="{{ route('dashboard') }}"
                           class="text-white/70 hover:text-white transition">
                            Dashboard
                        </a>

                    </div>

                </div>

                <!-- Bottom -->
                <div class="border-t border-white/10 mt-6 pt-4 text-center text-white/40 text-sm">
                    © {{ date('Y') }} ArtVerse. All rights reserved.
                </div>

            </div>
        </div>
    </footer>

</body>
</html>