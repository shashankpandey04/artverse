<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminModerateRequest;
use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $flagged = Artwork::where('moderation_status','flagged')->paginate(30);
        $users = User::paginate(30);
        return view('admin.index', compact('flagged','users'));
    }

    public function review($id)
    {
        $art = Artwork::findOrFail($id);
        return view('admin.review', compact('art'));
    }

    public function moderate(AdminModerateRequest $request, $id)
    {
        $art = Artwork::findOrFail($id);
        $data = $request->validated();

        $art->update([
            'moderation_status' => $data['moderation_status'],
            'moderation_notes' => $data['notes'] ?? null,
        ]);

        return redirect()->route('admin.index')->with('success','Artwork moderation updated.');
    }
}
