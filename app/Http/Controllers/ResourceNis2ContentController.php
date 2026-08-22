<?php

namespace App\Http\Controllers;

use App\Models\Nis2Content;
use Illuminate\Contracts\View\View;

class ResourceNis2ContentController extends Controller
{
    public function index(): View
    {
        $nis2Contents = Nis2Content::orderBy('sort_order')->get();

        return view('nis2.index', compact('nis2Contents'));
    }

    public function show(Nis2Content $nis2_content): View
    {
        return view('nis2.show', ['nis2Content' => $nis2_content]);
    }
}
