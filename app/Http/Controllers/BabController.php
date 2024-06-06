<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use Illuminate\Http\Request;

class BabController extends Controller
{
    public function index()
    {
        $babs = Bab::all();
        return view('babs.index', compact('babs'));
    }

    public function show($slug)
    {
        $bab = Bab::where('slug', $slug)->firstOrFail();
        $subbabs = $bab->subbabs;
        return view('babs.show', compact('bab', 'subbabs'));
    }
}
