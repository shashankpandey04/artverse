@extends('layout')

@section('content')

<!-- Hero Section -->
<section class="max-w-7xl mx-auto py-4">

    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>

            <span class="bg-white/10 border border-white/20 text-sm px-4 py-2 rounded-full backdrop-blur-lg">
                🎨 Discover Local Creativity
            </span>

            <h1 class="text-5xl md:text-7xl font-bold leading-tight mt-6">
                Showcase Art <br>
                Beyond Walls.
            </h1>

            <p class="text-white/70 text-lg mt-6 leading-relaxed">
                ArtVerse is a digital platform where local artists can share their creativity,
                connect with audiences, and build a thriving artistic community online.
            </p>
            <div class="flex items-center gap-4 mt-8">

                <a href="/gallery"
                   class="bg-indigo-500 hover:bg-indigo-600 px-6 py-3 rounded-full font-medium transition shadow-xl">
                    Explore Gallery
                </a>

                <a href="/auth/register"
                   class="bg-white/10 hover:bg-white/20 border border-white/20 px-6 py-3 rounded-full backdrop-blur-lg transition">
                    Join as Artist
                </a>

            </div>

        </div>

        <div class="relative">

            <div class="absolute -top-10 -left-10 w-40 h-40 bg-purple-500/30 rounded-full blur-3xl"></div>

            <div class="absolute bottom-0 right-0 w-40 h-40 bg-pink-500/20 rounded-full blur-3xl"></div>

            <div class="grid grid-cols-2 gap-4 relative z-10">

                <div class="space-y-4">

                    <div class="backdrop-blur-xl bg-white/10 border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?q=80&w=800"
                             class="w-full h-72 object-cover">

                        <div class="p-4">
                            <h3 class="font-semibold text-lg">Abstract Dreams</h3>
                            <p class="text-white/60 text-sm mt-1">by Sarah Lee</p>
                        </div>
                    </div>

                    <div class="backdrop-blur-xl bg-white/10 border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?q=80&w=800"
                             class="w-full h-48 object-cover">

                        <div class="p-4">
                            <h3 class="font-semibold text-lg">Urban Silence</h3>
                            <p class="text-white/60 text-sm mt-1">by Daniel Ross</p>
                        </div>
                    </div>

                </div>

                <div class="space-y-4 pt-10">

                    <div class="backdrop-blur-xl bg-white/10 border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?q=80&w=800"
                             class="w-full h-48 object-cover">

                        <div class="p-4">
                            <h3 class="font-semibold text-lg">Golden Horizon</h3>
                            <p class="text-white/60 text-sm mt-1">by Emma Stone</p>
                        </div>
                    </div>

                    <div class="backdrop-blur-xl bg-white/10 border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?q=80&w=800"
                             class="w-full h-72 object-cover">

                        <div class="p-4">
                            <h3 class="font-semibold text-lg">Color Symphony</h3>
                            <p class="text-white/60 text-sm mt-1">by Michael Ray</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="max-w-7xl mx-auto py-12">
    <div class="mb-8 flex items-center justify-between">
        <h2 class="text-3xl font-bold">Featured Artworks</h2>
        <a href="/gallery" class="text-sm text-white/60">View Gallery →</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($featured as $art)
            @include('components.artwork-card', ['art' => $art])
        @endforeach
    </div>
</section>

<section class="max-w-7xl mx-auto py-12">
    <div class="mb-8 flex items-center justify-between">
        <h2 class="text-3xl font-bold">Featured Artists</h2>
        <a href="/artists" class="text-sm text-white/60">See all artists →</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($artists as $artist)
            @include('components.artist-card', ['artist' => $artist])
        @endforeach
    </div>
</section>

<section class="max-w-7xl mx-auto py-20">

    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold">
            Why ArtVerse?
        </h2>

        <p class="text-white/60 mt-4 text-lg">
            Built for artists, powered by creativity and AI.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">

        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 transition">

            <div class="text-4xl mb-4">🖼️</div>

            <h3 class="text-2xl font-semibold">
                Digital Galleries
            </h3>

            <p class="text-white/60 mt-4 leading-relaxed">
                Artists can upload and showcase their artwork in elegant online galleries.
            </p>

        </div>

        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 transition">

            <div class="text-4xl mb-4">🤖</div>

            <h3 class="text-2xl font-semibold">
                AI Moderation
            </h3>

            <p class="text-white/60 mt-4 leading-relaxed">
                AI-powered systems help detect inappropriate and AI-generated content.
            </p>

        </div>

        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl p-8 hover:bg-white/10 transition">

            <div class="text-4xl mb-4">💬</div>

            <h3 class="text-2xl font-semibold">
                Community Interaction
            </h3>

            <p class="text-white/60 mt-4 leading-relaxed">
                Visitors can like, rate, and comment on artworks to support local artists.
            </p>

        </div>

    </div>

</section>

@endsection