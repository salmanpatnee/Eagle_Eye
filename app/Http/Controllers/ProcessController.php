<?php

namespace App\Http\Controllers;

use App\Models\Process;

class ProcessController extends Controller
{
    public function index()
    {
        $allProcess = Process::all();
        return view('ciso/process/index', compact('allProcess'));
    }

    public function show(Process $process)
    {
        return view('ciso/process/show', compact('process'));
    }
}
