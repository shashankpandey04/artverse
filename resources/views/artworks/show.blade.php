@extends('layout')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl p-6">
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <img src="{{ asset('storage/' . $art->image) }}" class="w-full rounded-2xl object-cover" />
            </div>
            <div>
                <h1 class="text-3xl font-bold">{{ $art->title }}</h1>
                <p class="text-white/60 mt-2">by <a href="/artists/{{ $art->user->id }}" class="underline">{{ $art->user->name }}</a></p>

                <p class="mt-4 text-white/70">{{ $art->description }}</p>

                <div class="mt-6 flex items-center gap-3">
                    <form method="POST" action="{{ route('likes.toggle', $art->id) }}">
                        @csrf
                        <button class="px-4 py-2 bg-indigo-600 rounded-full">Like ({{ $art->likes_count }})</button>
                    </form>

                    <form method="POST" action="{{ route('ratings.store', $art->id) }}">
                        @csrf
                        <select name="rating" class="bg-white/5 rounded px-3 py-2 text-white">
                            <option value="">Rate</option>
                            @for($i=1;$i<=5;$i++)
                                <option value="{{ $i }}">{{ $i }}★</option>
                            @endfor
                        </select>
                        <button class="ml-2 px-3 py-2 bg-white/10 rounded">Save</button>
                    </form>
                </div>

                <div class="mt-8">
                    <h3 class="font-semibold">Comments</h3>
                    @include('components.flash')
                    @foreach($art->comments as $c)
                        <div class="mt-3 p-3 bg-white/3 rounded">
                            <p class="text-sm text-white/80"><strong>{{ $c->user->name }}</strong> — {{ $c->comment }}</p>
                        </div>
                    @endforeach

                    @auth
                    <form method="POST" action="{{ route('comments.store', $art->id) }}" class="mt-4">
                        @csrf
                        <textarea name="comment" class="w-full bg-white/5 rounded p-3" rows="3"></textarea>
                        <button class="mt-2 px-4 py-2 bg-indigo-600 rounded-full">Post Comment</button>
                    </form>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
