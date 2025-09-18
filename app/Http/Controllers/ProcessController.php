<?php

namespace App\Http\Controllers;

use App\Models\Process;

class ProcessController extends Controller
{
    public function index()
    {
        $allProcess = Process::all();
        return view('process/index', compact('allProcess'));
    }

    public function show(Process $process)
    {
        return view('process/show', compact('process'));
    }
}
