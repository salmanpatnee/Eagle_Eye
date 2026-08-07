<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;

class WelcomeController extends Controller
{
    public function index()
    {
        $sections = LandingSection::get()->keyBy('section_key');

        return view('welcome', compact('sections'));
    }
}
