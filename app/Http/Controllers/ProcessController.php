<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $allProcess = Process::all();
        return view('4-Process/process/index', compact('allProcess'));
    }

    public function show(Process $process) {
        return view('4-Process/process/show', compact('process'));
    }
}
