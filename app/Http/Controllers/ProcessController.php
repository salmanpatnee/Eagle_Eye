<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\Process;

class ProcessController extends Controller
{
    public function index()
    {
        $allProcess = ArticleCategory::withCount('processes')->get();

        return view('ciso/process/index', compact('allProcess'));
    }

    public function show(ArticleCategory $category)
    {
        return view('ciso/process/show', compact('category'));
    }
}
