@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Review Artwork</h1>

    <div class="bg-white/5 rounded-2xl p-6 mb-6">
        <h2 class="text-2xl font-bold">{{ $art->title }}</h2>
        <p class="text-white/60">by {{ $art->user->name }}</p>

        <img src="{{ asset('storage/' . $art->image) }}" alt="{{ $art->title }}" class="w-full h-auto rounded-xl mt-4 mb-4" />

        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div>
                <p class="text-white/60">NSFW Score</p>
                <p class="text-2xl font-bold">{{ round($art->nsfw_score, 2) }}</p>
            </div>
            <div>
                <p class="text-white/60">AI Generated Score</p>
                <p class="text-2xl font-bold">{{ round($art->ai_generated_score, 2) }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.moderate', $art->id) }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-white mb-2">Moderation Status</label>
                <select name="moderation_status" class="w-full bg-white/5 border border-white/10 rounded-xl p-3">
                    <option value="approved" {{ $art->moderation_status === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="flagged" {{ $art->moderation_status === 'flagged' ? 'selected' : '' }}>Flagged</option>
                    <option value="rejected" {{ $art->moderation_status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div>
                <label class="block text-white mb-2">Authenticity Label</label>
                <select name="authenticity_label" class="w-full bg-white/5 border border-white/10 rounded-xl p-3">
                    <option value="Human Made" {{ $art->authenticity_label === 'Human Made' ? 'selected' : '' }}>Human Made</option>
                    <option value="AI Assisted" {{ $art->authenticity_label === 'AI Assisted' ? 'selected' : '' }}>AI Assisted</option>
                    <option value="Suspected AI Generated" {{ $art->authenticity_label === 'Suspected AI Generated' ? 'selected' : '' }}>Suspected AI Generated</option>
                </select>
            </div>

            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 px-6 py-3 rounded-full">Save Review</button>
        </form>
    </div>
</div>
@endsection
