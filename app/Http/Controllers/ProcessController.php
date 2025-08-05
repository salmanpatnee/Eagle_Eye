<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $allProcess = Process::all();
        return view('process/process/index', compact('allProcess'));
    }

    public function show(Process $process)
    {
        return view('process/process/show', compact('process'));
    }
}
