@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Artwork</h1>

    <form method="POST" action="{{ route('artworks.update', $artwork) }}" class="bg-white/5 rounded-2xl p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-white mb-2">Title</label>
            <input type="text" name="title" value="{{ $artwork->title }}" class="w-full bg-white/5 border border-white/10 rounded-xl p-3" required />
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Description</label>
            <textarea name="description" class="w-full bg-white/5 border border-white/10 rounded-xl p-3" rows="5">{{ $artwork->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Category</label>
            <select name="category" class="w-full bg-white/5 border border-white/10 rounded-xl p-3">
                <option value="">Select category</option>
                <option value="Painting" {{ $artwork->category === 'Painting' ? 'selected' : '' }}>Painting</option>
                <option value="Digital" {{ $artwork->category === 'Digital' ? 'selected' : '' }}>Digital</option>
                <option value="Photography" {{ $artwork->category === 'Photography' ? 'selected' : '' }}>Photography</option>
                <option value="Sculpture" {{ $artwork->category === 'Sculpture' ? 'selected' : '' }}>Sculpture</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Tags (comma-separated)</label>
            <input type="text" name="tags" value="{{ is_array($artwork->tags) ? implode(',', $artwork->tags) : $artwork->tags }}" class="w-full bg-white/5 border border-white/10 rounded-xl p-3" />
        </div>

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 px-6 py-3 rounded-full">Save Changes</button>
    </form>
</div>
@endsection
