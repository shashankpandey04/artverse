@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-4xl font-bold mb-8">Artists</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($artists as $artist)
            <a href="{{ route('artists.show', $artist->id) }}" class="bg-white/5 rounded-2xl p-6 hover:bg-white/10 transition">
                <h3 class="text-lg font-bold">{{ $artist->name }}</h3>
                <p class="text-white/60 text-sm mt-1">{{ $artist->bio ?? 'Local artist' }}</p>
                <p class="text-white/40 text-xs mt-2">{{ $artist->artworks->count() }} artworks</p>
            </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $artists->links() }}
    </div>
</div>
@endsection
