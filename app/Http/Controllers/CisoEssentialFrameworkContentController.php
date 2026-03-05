<?php

namespace App\Http\Controllers;

use App\Models\CisoEssentialFramework;
use Illuminate\Contracts\View\View;

class CisoEssentialFrameworkContentController extends Controller
{
    public function index(): View
    {
        $frameworks = CisoEssentialFramework::orderBy('id')->get();

        return view('ciso-essential-framework.index', compact('frameworks'));
    }

    public function show(CisoEssentialFramework $cisoEssentialFramework): View
    {
        return view('ciso-essential-framework.show', compact('cisoEssentialFramework'));
    }
}
