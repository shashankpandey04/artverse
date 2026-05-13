<nav class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50">
    <div class="backdrop-blur-xl bg-white/10 border border-white/20 shadow-2xl rounded-full px-6 py-3">
        
        <div class="flex items-center gap-8">

            <!-- Logo -->
            <a href="{{ route('home') }}"
               class="text-white text-xl font-bold tracking-wide hover:text-indigo-300 transition">
                ArtVerse
            </a>

            <!-- Nav Links -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}"
                   class="text-white/80 hover:text-white transition duration-200">
                    Home
                </a>

                <a href="{{ route('gallery') }}"
                   class="text-white/80 hover:text-white transition duration-200">
                    Gallery
                </a>

                <a href="{{ route('artists.index') }}"
                   class="text-white/80 hover:text-white transition duration-200">
                    Artists
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="text-white/80 hover:text-white transition duration-200">
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-full transition border border-white/10">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="bg-red-500/80 hover:bg-red-500 text-white px-4 py-2 rounded-full transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="text-white/80 hover:text-white transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 rounded-full transition shadow-lg">
                        Join
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>