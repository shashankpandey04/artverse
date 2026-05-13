@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-4xl font-bold mb-8">Admin Dashboard</h1>

    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white/5 rounded-2xl p-6">
            <p class="text-white/60">Flagged Artworks</p>
            <p class="text-3xl font-bold mt-2">{{ \App\Models\Artwork::where('moderation_status','flagged')->count() }}</p>
        </div>
        <div class="bg-white/5 rounded-2xl p-6">
            <p class="text-white/60">Total Users</p>
            <p class="text-3xl font-bold mt-2">{{ \App\Models\User::count() }}</p>
        </div>
        <div class="bg-white/5 rounded-2xl p-6">
            <p class="text-white/60">Total Artworks</p>
            <p class="text-3xl font-bold mt-2">{{ \App\Models\Artwork::count() }}</p>
        </div>
    </div>

    <h2 class="text-2xl font-bold mb-4">Flagged Artworks for Review</h2>
    <div class="space-y-4 mb-8">
        @forelse($flagged as $art)
            <div class="bg-white/5 rounded-2xl p-4 flex items-center justify-between">
                <div>
                    <h3 class="font-bold">{{ $art->title }}</h3>
                    <p class="text-white/60 text-sm">by {{ $art->user->name }} | Score: {{ round($art->nsfw_score, 2) }}</p>
                </div>
                <a href="{{ route('admin.review', $art->id) }}" class="bg-yellow-600 hover:bg-yellow-500 px-4 py-2 rounded-full">Review</a>
            </div>
        @empty
            <p class="text-white/60">No flagged artworks.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $flagged->links() }}
    </div>
</div>
@endsection
