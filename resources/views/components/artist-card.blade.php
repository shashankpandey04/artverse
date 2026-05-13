<div class="bg-white/3 rounded-2xl p-4 flex items-center gap-4">
    <img src="{{ asset('storage/' . ($artist->avatar ?? 'avatars/default.png')) }}" alt="{{ $artist->name }}" class="w-16 h-16 rounded-full object-cover" />
    <div>
        <h4 class="text-white font-semibold">{{ $artist->name }}</h4>
        <p class="text-white/60 text-sm">{{ $artist->bio ?? 'Local artist' }}</p>
    </div>
</div>
