<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Artwork;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, $artworkId)
    {
        $data = $request->validated();

        Comment::create([
            'artwork_id' => $data['artwork_id'],
            'user_id' => Auth::id(),
            'body' => $data['body'],
        ]);

        return back()->with('success','Comment posted.');
    }
}
