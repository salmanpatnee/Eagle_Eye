<?php

namespace App\Http\Controllers;

use App\Models\ISO27001;

class ISO27001Controller extends Controller
{
    public function index()
    {
        $allSections = ISO27001::all();

        return view('ciso.iso27001.index', compact('allSections'));
    }

    public function show(ISO27001 $section)
    {
        return view('ciso.iso27001.show', compact('section'));
    }
}
