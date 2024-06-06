<?php

namespace App\Http\Controllers;

use App\Models\Subbab;
use Illuminate\Http\Request;

class SubbabController extends Controller
{
    public function show($slug)
    {
        $subbab = Subbab::where('slug', $slug)->firstOrFail();
        $soals = $subbab->soals;
        return view('subbabs.show', compact('subbab', 'soals'));
    }
}
