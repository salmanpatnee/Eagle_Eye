<?php

namespace App\Http\Controllers;

use App\Models\Content;

class ResourceContentController extends Controller
{
    public function index()
    {
        $allSections = Content::orderBy('sort_order')->get()->groupBy('category');

        return view('resource.index', compact('allSections'));
    }

    public function show(Content $content)
    {
        return view('resource.show', compact('content'));
    }
}
