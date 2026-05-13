@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Upload Artwork</h1>

    <form method="POST" action="{{ route('artworks.store') }}" enctype="multipart/form-data" class="bg-white/5 rounded-2xl p-6">
        @csrf

        <div class="mb-4">
            <label class="block text-white mb-2">Title *</label>
            <input type="text" name="title" class="w-full bg-white/5 border border-white/10 rounded-xl p-3" required />
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Description</label>
            <textarea name="description" class="w-full bg-white/5 border border-white/10 rounded-xl p-3" rows="5"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Image *</label>
            <input type="file" name="image" class="w-full" accept="image/*" required />
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Category</label>
            <select name="category" class="w-full bg-white/5 border border-white/10 rounded-xl p-3">
                <option>Select category</option>
                <option>Painting</option>
                <option>Digital</option>
                <option>Photography</option>
                <option>Sculpture</option>
                <option>Other</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Tags (comma-separated)</label>
            <input type="text" name="tags" class="w-full bg-white/5 border border-white/10 rounded-xl p-3" />
        </div>

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 px-6 py-3 rounded-full">Upload</button>
    </form>
</div>
@endsection
