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
        $tags = $subbab->tags;
        $nextSubbab = Subbab::where('bab_id', $subbab->bab_id)
                            ->where('id', '>', $subbab->id)
                            ->orderBy('id', 'asc')
                            ->first();
        $allSubbabs = Subbab::where('bab_id', $subbab->bab_id)
                            ->get();
        $creator= Subbab::where('bab_id', $subbab->creator);
        return view('subbabs.show', compact('subbab', 'soals', 'tags', 'nextSubbab', 'allSubbabs', 'creator'));
    }
}
