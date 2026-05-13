<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($artworkId)
    {
        $userId = Auth::id();
        $exists = Like::where('artwork_id',$artworkId)->where('user_id',$userId)->first();

        if ($exists) {
            $exists->delete();
            Artwork::where('id',$artworkId)->decrement('likes_count');
            return back();
        }

        Like::create(['artwork_id'=>$artworkId,'user_id'=>$userId]);
        Artwork::where('id',$artworkId)->increment('likes_count');
        return back();
    }
}
