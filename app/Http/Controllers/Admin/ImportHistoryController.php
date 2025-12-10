<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportJob;
use Illuminate\Http\Request;

class ImportHistoryController extends Controller
{
    public function index()
    {
        $jobs = ImportJob::with(['mapping', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.import-manager.import-history', compact('jobs'));
    }

    public function show($id)
    {
        $job = ImportJob::with(['mapping', 'user'])->findOrFail($id);
        return view('admin.import-manager.import-log-detail', compact('job'));
    }
}
