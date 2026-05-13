@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-4xl font-bold mb-8">Dashboard</h1>

    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white/5 rounded-2xl p-6">
            <p class="text-white/60">Total Uploads</p>
            <p class="text-3xl font-bold mt-2">{{ $user->artworks->count() }}</p>
        </div>
        <div class="bg-white/5 rounded-2xl p-6">
            <p class="text-white/60">Total Likes</p>
            <p class="text-3xl font-bold mt-2">{{ $user->artworks->sum('likes_count') }}</p>
        </div>
        <div class="bg-white/5 rounded-2xl p-6">
            <p class="text-white/60">Total Views</p>
            <p class="text-3xl font-bold mt-2">{{ $user->artworks->sum('views_count') }}</p>
        </div>
        <div class="bg-white/5 rounded-2xl p-6">
            <p class="text-white/60">Comments</p>
            <p class="text-3xl font-bold mt-2">{{ $user->comments->count() }}</p>
        </div>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Recent Artworks</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($user->artworks as $art)
                @include('components.artwork-card', ['art' => $art])
            @empty
                <p class="text-white/60">No artworks yet. <a href="{{ route('artworks.create') }}" class="underline">Upload one!</a></p>
            @endforelse
        </div>
    </div>

    <div class="mb-8">
        <a href="{{ route('artworks.create') }}" class="bg-indigo-600 hover:bg-indigo-500 px-6 py-3 rounded-full">+ Upload New Artwork</a>
    </div>
</div>
@endsection
