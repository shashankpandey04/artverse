<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\Artwork;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(StoreRatingRequest $request, $artworkId)
    {
        $data = $request->validated();

        Rating::updateOrCreate(
            ['artwork_id' => $data['artwork_id'], 'user_id' => Auth::id()],
            ['rating' => $data['score']]
        );

        return back()->with('success','Rating saved.');
    }
}
