<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $artworkId)
    {
        $request->validate(['comment' => 'required|string|max:1000']);

        Comment::create([
            'artwork_id' => $artworkId,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success','Comment posted.');
    }
}
