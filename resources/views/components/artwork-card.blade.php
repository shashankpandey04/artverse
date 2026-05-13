<div class="group relative bg-white/2 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
    <a href="{{ route('artworks.show', $art->id) }}">
        <div class="h-64 bg-gray-800 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('storage/' . $art->image) }}" alt="{{ $art->title }}" class="w-full h-full object-cover group-hover:scale-105 transition" />
        </div>
    </a>

    <div class="p-4">
        <h3 class="font-semibold text-white">{{ $art->title }}</h3>
        <p class="text-xs text-white/60 mt-1">by <a href="/artists/{{ $art->user->id }}" class="underline">{{ $art->user->name }}</a></p>
    </div>
</div>
