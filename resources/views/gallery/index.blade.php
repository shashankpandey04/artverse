@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6">Gallery</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($artworks as $art)
            @include('components.artwork-card', ['art' => $art])
        @endforeach
    </div>

    <div class="mt-8">
        {{ $artworks->links() }}
    </div>
</div>
@endsection
