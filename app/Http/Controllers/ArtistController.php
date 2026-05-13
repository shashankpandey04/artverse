<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = User::where('role','artist')->paginate(24);
        return view('artists.index', compact('artists'));
    }

    public function show($id)
    {
        $artist = User::with('artworks')->findOrFail($id);
        return view('artists.show', compact('artist'));
    }
}
