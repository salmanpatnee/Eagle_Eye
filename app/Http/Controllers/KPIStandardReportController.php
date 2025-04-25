<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use App\Models\KPICategories;

class KPIStandardReportController extends Controller
{

    public function index()
    {
        $report = KPICategories::withCount('standards')->get();
        return view('4-Process/KpiStandardsReport/index', compact('report'));
    }

    public function show(Category $category)
    {
        $bestPractice = request('bestPractice') ?? null;

        $bestPractices = BestPractice::select('best_practices_id', 'best_practices_name', 'sort_order')
            ->orderBy('sort_order')
            ->get();


        $category->load([
            'recommededPriorites' => function ($query) use ($bestPractice) {
                if ($bestPractice) {
                    $query->where('best_practice_id', $bestPractice);
                }
            },
            'standardPriorities' => function ($query) use ($bestPractice) {
                if ($bestPractice) {
                    $query->where('best_practice_id', $bestPractice);
                }
            },
        ]);

        return view('4-Process/KpiStandardsReport/show', compact('category', 'bestPractices'));
    }
}
