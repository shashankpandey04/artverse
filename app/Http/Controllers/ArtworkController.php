<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Services\Moderation\ModerationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index(Request $request)
    {
        $q = Artwork::query();

        if ($request->filled('category')) {
            $q->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $q->where('title','like','%'.$request->search.'%');
        }

        $artworks = $q->latest()->paginate(24);

        return view('gallery.index', compact('artworks'));
    }

    public function create()
    {
        $this->authorize('create', Artwork::class);
        return view('artworks.create');
    }

    public function store(Request $request, ModerationService $moderation)
    {
        $this->authorize('create', Artwork::class);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:5120',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('artworks','public');

        $art = Artwork::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'image' => $path,
            'category' => $data['category'] ?? null,
            'tags' => $data['tags'] ? explode(',', $data['tags']) : [],
        ]);

        // Run moderation (mock)
        $moderation->analyze($art);

        return redirect()->route('artworks.show', $art->id)->with('success','Artwork uploaded — pending moderation.');
    }

    public function show($id)
    {
        $art = Artwork::with('user','comments.user')->findOrFail($id);
        $art->increment('views_count');

        return view('artworks.show', compact('art'));
    }

    public function edit(Artwork $artwork)
    {
        $this->authorize('update', $artwork);
        return view('artworks.edit', compact('artwork'));
    }

    public function update(Request $request, Artwork $artwork)
    {
        $this->authorize('update', $artwork);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
        ]);

        $artwork->update([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'category' => $data['category'] ?? null,
            'tags' => $data['tags'] ? explode(',', $data['tags']) : $artwork->tags,
        ]);

        return back()->with('success','Artwork updated.');
    }

    public function destroy(Artwork $artwork)
    {
        $this->authorize('delete', $artwork);
        $artwork->delete();
        return redirect()->route('dashboard')->with('success','Artwork deleted.');
    }
}
