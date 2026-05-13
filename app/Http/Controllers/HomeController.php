<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Artwork::latest()->take(8)->get();
        $artists = User::where('role','artist')->take(6)->get();

        return view('index', compact('featured','artists'));
    }
}
