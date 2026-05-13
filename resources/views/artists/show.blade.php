@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <div class="bg-white/5 rounded-2xl p-8 mb-8">
        <h1 class="text-4xl font-bold">{{ $artist->name }}</h1>
        <p class="text-white/60 mt-2">{{ $artist->bio ?? 'Local artist' }}</p>
        <p class="text-white/60 text-sm mt-2">📍 {{ $artist->location ?? 'Unknown' }}</p>
    </div>

    <h2 class="text-2xl font-bold mb-6">Artworks ({{ $artist->artworks->count() }})</h2>

    @if($artist->artworks->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($artist->artworks as $art)
                @include('components.artwork-card', ['art' => $art])
            @endforeach
        </div>
    @else
        <p class="text-white/60">No artworks yet.</p>
    @endif
</div>
@endsection
