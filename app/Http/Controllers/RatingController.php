<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $artworkId)
    {
        $data = $request->validate(['rating' => 'required|integer|min:1|max:5']);

        Rating::updateOrCreate(
            ['artwork_id' => $artworkId, 'user_id' => Auth::id()],
            ['rating' => $data['rating']]
        );

        return back()->with('success','Rating saved.');
    }
}
