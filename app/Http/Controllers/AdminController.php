<?php

namespace App\Http\Controllers;

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

    public function moderate(Request $request, $id)
    {
        $art = Artwork::findOrFail($id);
        $data = $request->validate(['moderation_status' => 'required|string', 'authenticity_label' => 'nullable|string']);
        $art->update($data);
        return redirect()->route('admin.index')->with('success','Artwork moderation updated.');
    }
}
